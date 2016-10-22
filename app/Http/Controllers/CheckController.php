<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\Att;

class CheckController extends Controller
{
    //项目列表
    public function getProlist(){
        $prolist = Project::orderBy('pid','desc')->get();
        return view('prolist',['data'=>$prolist]);
    }


    //审核项目
    public function getCheck($pid){
        $project = Project::find($pid);
        $att = Att::where('pid',$pid)->first();

        //检查是否有数据
        if(empty($project))
        {
            return redirect('/prolist');
        }

        //如果有数据则跳转到审核页面
        return view('shenhe',['project'=>$project,'att'=>$att]);
    }

    //提交审核结果
    public function postCheck(Request $req){
        //从隐藏域中获取pid
        $pid = $req->pid;
        $att = Att::where('pid',$pid)->first();
        $project = Project::find($pid);
        
        //判断该项目是否存在
        if(empty($project)){
            return redirect('/prolist');
        }

        //在提交申请时已经检查, 这里再次检查, 检查该用户是否有之前的借款尚未归还
        $loan = Project::where('pid','=',$pid)->where('status','<>',3)->count();
        if($loan > 0){
            return 'this user has another loan';
        }

        //如果项目存在,则将获取的数据写入数据库
        $project->title = $req->title;
        $att->title = $req->title;
        $att->realname = $req->realname;
        $att->gender = $req->gender;
        $att->marry = $req->marry;
        $att->salary = $req->salary;
        $att->jobcity = $req->jobcity;
        $project->hrange = $req->hrange;
        $project->rate = $req->rate;
        $att->udesc = $req->udesc;
        $project->status = $req->status;

        //判断是否写入成功
        if($project->save() && $att->save()){
            return redirect('/prolist');
        } else{
            // return ['status'=>0; 'msg'=>'database insert failed'];
            return 'database insert failed';
        }

    }

}
