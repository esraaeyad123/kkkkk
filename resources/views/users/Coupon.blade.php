<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">Online Home Services <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="{{ url('users/worker_account')}}">your appointments</a></li>
						<li class="has-dropdown">
							<a href="#gtco-container">setting</a>
						
						</li>
                        <li ><a  >instructions</a> </li>
							@if(empty(Auth::check()))
					
						<li><a href="{{ url('/login_register')}}"><i class="fa fa-lock"></i> Login</a></li>
							<li><a href="{{ url('/worker_login')}}"><i class="fa fa-lock"></i> Login worker</a></li>
@else
			<li><a href="{{ url('/worker_account')}}"><i class="fa fa-user"></i> Account</a></li>
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
<div class="gtco-section">
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
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a coupon code you want to use.</p>
			</div>
			<div class="col-md-12">
                    <div class="col-md-6 animate-box">
					<div class="chose_area">
						<ul >
							<li>
								<form action="{{ url('/apply-coupon') }}" method="post">{{ csrf_field() }}
									<label>Coupon Code</label>
									<input type="text" name="coupon_code">
									<input type="submit" value="Apply" class="btn btn-default">
								</form>
							</li>
						</ul>
					</div>
				</div>
				<div class="gtco-section">
					<div class="gtco-container">
						<ul>
							
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
