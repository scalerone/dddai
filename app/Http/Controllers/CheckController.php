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

}
