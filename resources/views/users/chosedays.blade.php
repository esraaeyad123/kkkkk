@extends('layouts.frontLayout.free_design')

<?php use App\Http\Controllers\Controller;
$mainCategories =  Controller::mainCategories();
?>
<!-- <div class="page-inner"> -->
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
	<!doctyp html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	<script src="http://maps.google.com/maps/api/js?libraries=places&region=uk&language=en&sensor=true"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">Online Home Services <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="{{ url('worker')}}">your appointments</a></li>

                        <li ><a href="{{ url('chosedays')}}" >instructions</a> </li>
							@if(empty(Auth::check()))
					
						<li><a href="{{ url('/login_register')}}"><i class="fa fa-lock"></i> Login</a></li>
							<li><a href="{{ url('/worker_login')}}"><i class="fa fa-lock"></i> Login worker</a></li>
@else
			
				<li><a href="{{ url('/user-logout')}}"> <i class="fa fa-sign-out"></i> logout</a></li>
@endif
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	</html>

	<title> choses days and time</title>

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
	
 
 <div class="gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 animate-box">
                        <h3>Choose days and deposit
 
</h3>
                     

<form enctype= "multipart/form-data" class="form-horizontal" method="post" action="{{url('/chosedays')}}" name="chosedays" id="chosedays" novalidate="novalidate">{{ csrf_field() }}                     
                         
                            <div class="row form-group">
                                <div   class="col-md-12">

                                    

                    <div class="weekDays-selector"name="days">

  <input type="checkbox" id="weekday-mon" class="weekday" name="days[]" value="Saturday "  /> 
  <label for="weekday-mon">Sat</label>
  <input type="checkbox" id="weekday-tue" class="weekday" name="days[]" value="Thursday"/>
  <label for="weekday-tue">Thu</label>
  <input type="checkbox" id="weekday-wed" class="weekday" name="days[]" value="Tuesday"  > 
  <label for="weekday-wed">Tue</label>
  <input type="checkbox" id="weekday-thu" class="weekday" name="days[]"value="Sunday"  />
  <label for="weekday-thu">Sun</label>
  <input type="checkbox" id="weekday-fri" class="weekday" name="days[]"value="Friday"  />
  <label for="weekday-fri">Fri</label>
  <input type="checkbox" id="weekday-sat" class="weekday" name="days[]"value="Wednesday"  />
  <label for="weekday-sat">Wed</label>
  <input type="checkbox" id="weekday-sun" class="weekday" name="days[]"value="Monday"  />
  <label for="weekday-sun">Mon</label>
  
  </div>
</div> 

                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" name="deposit">deposit</label>
                                    <input type="text" name="deposit" id="deposit" class="form-control" placeholder="deposit">
                                </div>

                            </div>
                           
                                <div class="col-md-12" name="message" >
                                   
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
                                </div>
                           


  <div class="col-md-12">
                                    
                                 <input type="submit" value="send" class="btn btn-success">
                                </div>

                       
                   </form> 
				   </div>
                  	

	
                    </div>
                </div>
				
            </div>
        </div>
	
    </div>
