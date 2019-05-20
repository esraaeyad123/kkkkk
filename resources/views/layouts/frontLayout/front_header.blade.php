
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
						<li ><a class="fa fa-phone" href="{{ url('/contact') }}">Contact</a></li>
                    
							@if(empty(Auth::check()))
					
						<li><a href="{{ url('/login_register')}}"><i class="fa fa-lock"></i> Login</a></li>
							<li><a href="{{ url('/worker_login')}}"><i class="fa fa-lock"></i> Create account worker</a></li>
@else
	<li><a href="{{ url('/worker')}}"><i class="fa fa-user"></i> worker page </a></li>
			    <li ><a class="fa fa fa-shopping-cart" href="{{ url('/cart') }}"></i>cart</a></li>
				<li><a href="{{ url('/user-logout')}}"> <i class="fa fa-sign-out"></i> logout</a></li>
@endif  
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	

