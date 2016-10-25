<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Att;
use Auth;
use App\Bid;
// use App\Hk;
// use App\Task;
use DB;


class ProjectController extends Controller
{
    //借款页面
    public function getJie(){
        return view('woyaojiekuan');
    }

    //提交借款
    public function postJie(Request $req){

        //检查该用户是否有之前的借款尚未归还
        $loan = Project::where('uid','=',Auth::user()->uid)->where('status','<>',3)->count();

        if($loan > 0){
            return 'this user has another loan';
        }

        //实例化Project和Att
        $project = new Project();
        $att = new Att();
        // $user = Auth::user();
        $user = $req->user();

        $project->uid = $user->uid;
        $project->name = $user->name;
        $project->money = $req->money * 1000; //使用"厘"为计量单位
        $project->mobile = $req->mobile;
        $project->pubtime = time();
        $project->save();

        $att->uid = $user->uid;
        $att->pid = $project->pid;
        $att->age = $req->age;
        $att->pid = $project->pid;

        $att->save();

        echo 'ok';
    }



    //项目投标展示
    public function getPro($pid){
        $project = Project::where(['pid'=>$pid, 'status'=>1])->first();
        return view('lijitouzi',['project'=>$project]);
    }




    //提交投资申请
    public function postTouzi(Request $req, $pid){
        $project = Project::find($pid);
        $money = $req->money * 1000; //将用户的钱转化成"厘"为单位

        //判断项目是否可投资
        if($project->status > 1){
            return ['status'=>0, 'msg'=>'bid finished'];
        }

        //判断投资的钱是否大于可投资的金额
        $allow = $project->money - $project->receive;

        if($req->money > $allow){
            return ['status'=>0, 'msg'=>'money could not exceed allowable invest'];
        }

        //保存数据
        $user = Auth::user();
        $bid = new Bid;

        $bid->uid = $user->uid;
        $bid->pid = $project->pid;
        $bid->title = $project->title;
        $bid->money = $money;
        $bid->pubtime = time();

        // $bid->save();

        //更新projects表
        $project->increment('receive', $money);

        //检查项目招标是否满额
        if($project->money == $project->receive){
            $this->touziDone($project);
        }

        
        //写入投资信息
        if($bid->save()){
            return redirect("/");
        } else{
            return ['status'=>0, 'msg'=>'database insert failed'];
        }
        
    }


    //生成还款表和收益表
    public function touziDone($project){
        //一旦招标满额, 修改项目状态
        $project->status = 2; //项目状态修改为"还款收益中"
        $project->save();

        //为借款者, 生成还款列表
        $row = ['uid'=>$project->uid, 'pid'=>$project->pid, 'title'=>$project->title, 'status'=>0];
        $row['amount'] = $project->money / $project->hrange + $project->money * $project->rate / 12 / 100;

        //循环产生每个月的还款任务
        for ($i = 1; $i<=$project->hrange; $i++){
            $row['paydate'] = date('Y-m-d', strtotime(" + $i months"));
            DB::table('hks')->insert($row);
        }


        //为该项目的所有投资者, 生成收益任务
        $bids = DB::table('bids')->where('pid', $project->pid)->get();

        //清除$row变量(上面的影响)
        $row = [];

        $row = ['pid'=>$project->pid, 'title'=>$project->title];
        $row['enddate'] = date('Y-m-d', strtotime("+ {$project->hrange} months"));

        //循环生成每个投资者的每天的预期收益信息
        foreach($bids as $bid){
            $row['uid'] = $bid->uid;
            $row['amount'] = $bid->money * $project->rate / 365 / 100; 
            DB::table('tasks')->insert($row);
        }


        /*
        //下面是计划使用Model来操作数据库, 但是无法跑通

        $hk = new Hk;

        //生成还款列表
        //每月的还款金额
        $hk->amount = ( $project->money / $project->hrange + $project->money * $project->rate / 12) / 1000;

        $hk->uid = $project->uid;
        $hk->pid = $project->pid;
        $hk->title = $project->title;
        $hk->status = 0;

        //生成借款者的每月还款日期, 并存入数据库
        for( $i = 0; $i < $project->hrange; $i++ ){
            $hk->paydate = date('Y-m-d', strtotime( "+ $i months"));
            $hk->save();
        }
        
        //生成投资者的每天预期收益信息
        $task = new Task;
        $bids = $project->get();

        foreach ($bids as $bid){
            $task->uid = $bid->uid;
            $task->amount = $bids->money * $project->rate / 365 / 1000;
            $task->save();
        }
        */
    }
}
