@extends('layouts.frontLayout.front_design')
@section('content')
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" >

  <script  src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">

                <div class="col-md-12 col-md-offset-0 text-center">

                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                            <h1 class="cursive-font">Thanks </h1>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>

</section>

<section id="do_action">
	   <div class="gtco-container">
		<div class="col-md-12 col-md-offset-0 text-center">
			<h3>YOUR  ORDER HAS BEEN PLACED</h3>
			
			<p>Your order number is {{ Session::get('order_id') }} and total payable about is INR {{ Session::get('grand_total') }}</p>
										<a class="btn btn-primary check_out" href="{{ url('thanks') }}">Check Out</a>
		</div>
	</div> 	
</section>

@endsection

<?php
Session::forget('grand_total');
Session::forget('order_id');
?>