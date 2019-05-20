@extends('layouts.frontLayout.free_design')

<?php use App\Http\Controllers\Controller;
$mainCategories =  Controller::mainCategories();
?>
<!-- <div class="page-inner"> -->
<nav class="gtco-nav" role="navigation">
    <div class="gtco-container">

        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div id="gtco-logo"><a href="index.html">Online Home Services <em>.</em></a></div>
            </div>
            <div class="col-xs-8 text-right menu-1">
                <ul>
                   <li class="has-dropdown">
							<a href="#gtco-container">Services</a>
							<ul class="dropdown">
                                @foreach($mainCategories as $cat)
                                    <li><a href="{{ asset('Category/'.$cat->url) }}">{{ $cat->name }}</a></li>
                                @endforeach
							</ul>
						</li>
                    <li><a href="{{ url('/users/Coupon')}}">Coupon</a></li>

                    
      @if(empty(Auth::check()))
					
						<li><a href="{{ url('/login_register')}}"><i class="fa fa-lock"></i> Login</a></li>
							<li><a href="{{ url('/worker_login')}}"><i class="fa fa-lock"></i> Create account worker</a></li>
@else
	<li><a href="{{ url('/user_account')}}"><i class="fa fa-user"></i> profile page </a></li>
			    <li ><a  href="{{ url('/cart') }}"><i class="fa fa fa-shopping-cart"></i>cart</a></li>
				<li><a href="{{ url('/user-logout')}}"> <i class="fa fa-sign-out"></i> logout</a></li>
@endif  
                </ul>
            </div>
        </div>

    </div>
</nav>


<link href="slider.css" rel="stylesheet" type="text/css">
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" >

    <script  src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row">

            <div class="col-md-12 col-md-offset-0 text-center">

                <div class="row row-mt-15em">
                    <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                        <h1 class="cursive-font">welcome to your pge </h1>
                    </div>

                </div>

            </div>
        </div>
    </div>
</header>

    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif



    <div class="container-fluid">
      
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h2>Your reservation is confirmed</h2>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                
                                <th>worker Name</th>
								  <th>time</th>
                               <th>days</th>
                                
                            </tr>
                            </thead>
                            <tbody>

@foreach( $mm as $order)
                    
              <tbody>
			
                <tr class="gradeX">
                 
                   <td class="center"> {{  $order->worker_name  }}</td>
                    <td class="center">{{ $order->time }}</td>
					<td class="center">{{ $order->days }}</td>
					 <td class="center">


                                    <a href=  data-toggle="modal" class="btn btn-success btn-mini"> confirmed</a>
                                   


                                </td>
	@endforeach					 
</tr>
    </tbody>
	
                               


                          


                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
