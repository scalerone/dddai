<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class CheckController extends Controller
{
    //项目列表
    public function getProlist(){
        $prolist = Project::orderBy('pid','desc')->get();
        return view('prolist',['data'=>$prolist]);
    }

}
