@extends('layouts.frontLayout.front_design')
@section('content')

    <script src="public/frontend_js/js/mapInput.js"></script>
	    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora" />
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">


                    <div class="row row-mt-4">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                            <h1 class="cursive-font">Taste all our menu!</h1>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </header>
		<div class="container">
			  
				<div class="row">
				<div class="col-md-12">
					
					
									@foreach($deatails as $employe)

						
<article class="ProfileCardContainer">
	
	
	 @if(!empty($employe->picture))
    <img class="ProfileCardAvatar"  src="{{ asset('/images/backend_images/product/medium/'.$employe->picture) }}"  ></img>
@endif
    <div class="ProfileCardTop">
        <p class="ProfileCardName">{{  $employe->firstname }}</p>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 516 131" enable-background="new 0 0 516 131" xml:space="preserve"><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="258" y1="130.3" x2="258" y2="-0.7"><stop offset="0" style="stop-color:#808080"/><stop offset="1" style="stop-color:#8C8C8C"/></linearGradient><path fill="url(#SVGID_1_)" d="M430 0h-71.895C335.913 29.5 298.4 50.2 258 50.2c-40.404 0-77.914-20.735-100.105-50.2H86 C38.503 0 0 38.5 0 85.949V131h516V85.949C516 38.5 477.5 0 430 0z"/><path fill="#FFFFFF" d="M356.105 0h-6.237C328.237 26.8 295.1 44 258 43.95S187.763 26.8 166.1 0h-6.237h-2 C180.086 29.5 217.6 50.2 258 50.2c40.403 0 77.913-20.735 100.105-50.2H356.105z"/></svg>
  
	</div>
    <div class="ProfileCardBox">
        <ul class="ProfileCardTextTitle">
            <li>Email</li>
            <li>price</li>
            
            <li class="ProfileCardPlace">.</li>
            <li class="ProfileCardTwitter">.</li>
          
        </ul>
        <ul class="ProfileCardText">
            <li class="ProfileCardBorder">{{ $employe->email }}</li>
            <li class="ProfileCardBorder">{{  $employe->price }}</li>

            <li class="ProfileCardBorder">{{  $employe->address }}</li>
            <li class="ProfileCardBorder"><a href="https://twitter.com/Stahlfest" target="_blank"> {{$employe-> days}}</a></li>
		

														
			
                                                        
          <div class="col-sm-7">
							<form name="addtoCartForm" id="addtoCartForm" action="{{ url('add-cart/ $employe->id ') }}" method="post">{{ csrf_field() }}
		                          <input type="hidden" name="worker_id" value="{{ $employe->id }}">
								          <input type="hidden" name="worker_id" value="{{ $employe->id }}">
										      
		                        <input type="hidden" name="worker_name" value="{{$employe->firstname }}">
									 <input type="hidden" name="worker_price" value="{{$employe->price }}">
								 <input type="hidden" name="time" value="{{$employe->time}}">
								  <input type="hidden" name="days" value="{{$employe->days }}">
								<button type="submit" class="btn btn-fefault cart" id="cartButton">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
								</form>	
								</div><!--/product-information-->
							
						</div>
					</div><!--/product-details-->
        </ul>
    </div>
	

 
</article>

		 @endforeach 		
		
					
					</div>
				
						
	
			
			@endsection