@extends('layouts.frontLayout.front_design')
@section('content')
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora" />
      	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					

					<div class="row row-mt-15em">
						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
							<h1 class="cursive-font"> choose one of our workers  !</h1>	
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
					<h2 class="cursive-font primary-color"> choose one of our workers</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
@foreach($productsAll as $employe)
				<div class="col-lg-4 col-md-4 col-sm-6">
				 @if(!empty($employe->picture))
				<div  class="fh5co-card-item ">	
				
						<figure>
						
							   
							<img src="{{ asset('/images/backend_images/product/medium/'.$employe->picture) }}"  alt="Image" class="img-responsive">
						</figure>
						@endif
						
						<div class="fh5co-text">
						<h2>Name :{{  $employe->firstname }}</h2>
							<h2 >address :{{  $employe->address }}</h2>
							<p>{{$employe-> days}}</p>
							<h2>{{ $employe->email }}</h2>
							<p><span class="price cursive-font price cursive-font">price of deposit : {{  $employe->price }}  $</span></p>
							
							 <form name="addtoCartForm" id="addtoCartForm" action="{{ url('users/de/'.$employe->id) }}"  method="post">{{ csrf_field() }}
				 	
							<input type="submit" value="Send Message" class="btn btn-primary">
						
											
											
								</form>
									
						</div>
					</div>
				</div>
				
								
								
		 @endforeach 
				
			

			

				

				

			</div>
		</div>
	</div>
 
	
	
@endsection
