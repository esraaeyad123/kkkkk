@extends('layouts.frontLayout.free_design')
<?php use App\Http\Controllers\Controller;
$mainCategories =  Controller::mainCategories();
?>
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
	<li><a href="{{ url('/user_account')}}"><i class="fa fa-user"></i> profile page </a></li>
			    <li ><a  href="{{ url('/cart') }}"><i class="fa fa fa-shopping-cart"></i>cart</a></li>
				<li><a href="{{ url('/user-logout')}}"> <i class="fa fa-sign-out"></i> logout</a></li>
@endif  
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" >
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.css">
                <div class="col-md-12 col-md-offset-0 text-center">

                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                            <h1 class="cursive-font"> hello! your reservations   </h1>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>
@if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif



 <div class="container-fluid">

   
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h2>Reservations</h2>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
				 <th>number of order</th>
				  <th>worker id</th>
                  <th>price</th>
                  <th>Worker Name</th>
                
            
                  <th>description</th>
                  <th>date</th>
                  <th>days</th>
                <th>email</th>
           <th>action</th>  
               
                </tr>
              </thead>
              <tbody>
			  <?php $total_amount = 0; ?>
           
              @foreach( $user_Cart as $cart)
			  
                <tr class="gradeX">
             <td class="center">{{$cart->id}}</td>
			  <td class="center">{{$cart->worker_id}}</td>
                  <td class="center">{{$cart->price}}</td>
                  <td class="center">{{$cart->worker_name}}</td>
                  <td class="center">{{$cart->description}}</td>
             
				             <td class="center"> {{$cart->time}}
	
			  </td>	 
			  	  <td class="center">{{$cart->days}}</td>
				  <td class="center">{{$cart->users_email}}</td>
       	  <td class="center">      <a  href="{{ url('users/delete_cart/'.$cart->id) }}"  rel1="delete_worker"  class="btn btn-danger btn-mini ">Delete</a>    </td>  
			  

			  
			




		  
		  

                </tr>
                      
                </tr>
					<?php $total_amount = $total_amount + ($cart->price); ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




    <form action="{{ url('/apply-coupon') }}" method="post">{{ csrf_field() }}
	  <div class="col-md-5 col-md-push-1 animate-box">

                       
<div class="row form-group">
                                <div class="col-md-12">
                                   <label>Coupon Code</label>
<ul><input type="text" name="coupon_code">
        <input type="submit" value="Apply" class="btn btn-default">
		@if(!empty(Session::get('CouponAmount')))
							<li>Sub Total <span>INR <?php echo $total_amount; ?></span></li>
							<li>Coupon Discount <span>INR <?php echo Session::get('CouponAmount'); ?></span></li>
							<li>Grand Total <span>INR <?php echo $total_amount - Session::get('CouponAmount'); ?></span></li>
						@else
							<li>Grand Total <span>INR <?php echo $total_amount; ?></span></li>
						@endif
					</ul>
                            </ul> 
							 <ul>
                               
      
							<a class="btn btn-primary check_out" href="{{ url('/stripe') }}">Check Out</a>
                            </ul> 
                                </div>
                            </div>
<div class="col-sm-6">
					<div class="total_area">
						<ul>
							
						</ul>
                    </div>
    </form>

                    </div>
    

</div>


