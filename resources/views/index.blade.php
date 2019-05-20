<?php use App\Http\Controllers\Controller;
$mainCategories =  Controller::mainCategories();
?>

@extends('layouts.frontLayout.front_design')
@section('content')


    <header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">


                    <div class="row row-mt-15em">
                        <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                            <h1 class="cursive-font">Try it .... choces our serives!</h1>
                        </div>
                        <div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
                            <div class="form-wrap">
                                <div class="tab">

                                    <div class="tab-content">
                                        <div class="tab-content-inner active" data-content="signup">
                                            <h3 class="cursive-font">Login</h3>
                                            <form action="#">
                          

                                     <form name="loginForm" id="loginForm" action="{{route('login')}}" method="POST" >{{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Your email address">
                                        </div>
                                    </div>
 <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="password">password</label>
                                    <input type="password" id="myPassword" name="password" class="form-control" placeholder="password">
                                </div>
                            </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    <span>
							
                                
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </header>

    <div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font primary-color">Popular Services</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
                        @foreach($catAll as $cat)
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <a href="images/frontend_images/img_1.jpg" class="fh5co-card-item image-popup">
                                                <figure>
                                                    <div class="overlay"><i class="ti-plus"></i></div>
                                                    <img src="images/frontend_images/img_1.jpg" alt="Image" class="img-responsive">
                                                </figure>
                                                <div class="fh5co-text">
                                                    <h2>{{ $cat ->name }}</h2>
                                                    <p>{{ $cat ->description }}</p>
                                                    
                                                </div>
                                            </a>
                                        </div>
                            @endforeach
			</div>
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2 class="cursive-font">Our Services</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<h3>Happy People</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-thought"></i>
						</span>
						<h3>Creative Culinary</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-truck"></i>
						</span>
						<h3>speed Delivery</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				

			</div>
		</div>
	</div>


	



	
	<!-- </div> -->



	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
@endsection
