<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use DB;
use App\OrderDetails;
use Charts;
use App\CouponUsed;

class ChartController extends Controller
{
    public function index()
    {
    	$users = Users::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
					->title("Monthly new Register Users")
					->elementLabel("Total Users")
					->dimensions(700, 500)
					->groupByMonth(date('Y'), true);
        return view('reports.users',compact('chart'));
        // composer require consoletvs/charts:5.*
	}
	public function sales(){
		$sales= OrderDetails::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
					->get();
		$chart = Charts::database($sales, 'bar', 'highcharts')
					->title("Monthly Product Sales")
					->elementLabel("Total ordres")
					->dimensions(700, 500)
					->groupByMonth(date('Y'), true);
		return view('reports.sales',compact('chart'));
	}
	public function couponused(){
		$coupon= CouponUsed::where(DB::raw("(DATE_FORMAT(updated_at,'%Y'))"),date('Y'))
					->get();
		$chart = Charts::database($coupon, 'bar', 'highcharts')
					->title("Coupon Used")
					->elementLabel("Total Users")
					->dimensions(700, 500)
					->groupByMonth(date('Y'), true);
		return view('reports.coupons',compact('chart'));
	}
}
