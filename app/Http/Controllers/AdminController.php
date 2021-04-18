<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
class AdminController extends Controller
{
    //
    public  function  index()
    {
//        $users=User::all();
//        $count['id']=1;
//        foreach($users as $user)
//        {
//
//            $cc[$user->name]=count($user->answers);
//
//        }

//        dd();



        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
        ];
        try {
            $chart1 = new LaravelChart($chart_options);
        } catch (\Exception $e) {
            dd($e);
        }

//        dd($chart1->renderHtml());
        return view('admin.index',compact('chart1'));
    }
}
