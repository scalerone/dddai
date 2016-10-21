<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    //借款
    public function getJie(){
        return view('woyaojiekuan');
    }

    //提交借款
    public function postJie(){
        return 3;
    }
}
