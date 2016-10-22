<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Att;
use Auth;
use App\Bid;


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
        $bid = new Bid();

        $bid->uid = $user->uid;
        $bid->pid = $project->pid;
        $bid->title = $project->title;
        $bid->money = $req->money * 1000; //使用"厘"为单位
        $bid->pubtime = time();

        //更新projects表
        $project->increment('receive', $money);

        //检查项目招标是否满额
        if($project->money === $project->receive){
            $project->status = 2;
            $project->save();
        }

        //写入投资信息
        if($bid->save()){
            return redirect('/');
        } else{
            return ['status'=>0, 'msg'=>'database insert failed'];
        }
    }
}
