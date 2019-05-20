<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category ;
use App\employe ;



class IndexController extends Controller
{
    public function index(){
	  

	    $catAll=Category::get();
		$employeAll=employe::get();
		 $employeAll=json_decode(json_encode($employeAll));


     //   $catAll=Category::get(); echo "<pre>" ;
       //	print_r($employeAll);die;
		return view('index',compact('catAll','employeAll'));
	}
}
