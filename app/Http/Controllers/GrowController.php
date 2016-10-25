<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GrowController extends Controller
{
    //后来来形成每日的支付列表
    public function getPayrun(){
        //获取今天的日期
        $today = date('Y-m-d');
        
        //判断今天是否已经支付
        $runned = DB::table('grows')->where('paytime',$today)->get();
        if ($runned){
            exit;
        }

        //在tasks表中, 只要是大于今天日期的, 都应该得到收益
        $tasks = DB::table('tasks')->where('enddate','>=', $today)->get();

        //循环为每个人写入收益信息
        foreach($tasks as $t){
            $row['uid'] = $t->uid;
            $row['pid'] = $t->pid;
            $row['title'] = $t->title;
            $row['amount'] = $t->amount;
            $row['paytime'] = $today;
            DB::table('grows')->insert($row);
        }
    }

}
