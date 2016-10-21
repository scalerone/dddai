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
        //上边new完之后,对象对应的就是表,称为表对象,此时对象为空
        //下面又给表对象中添加数据,执行save()
        //此时的$project对象, 对应的就是刚刚执行插入的那一行数据; 因此后面就可以根据它取出pid

        $att->uid = $user->uid;
        $att->pid = $project->pid;
        $att->age = $req->age;
        $att->pid = $project->pid; //此时可以用$project取到该表对象的任何字段值
        $att->save();

        echo 'ok';
    }
}
