<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Att;
use Auth;

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
        $project->money = $req->money * 1000;
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
}
