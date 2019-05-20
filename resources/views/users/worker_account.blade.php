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
	<html>
<head>
	<title> reservation</title>
	<style>
#myMap {
   height: 350px;
   width: 680px;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>

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
	
 <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Requests</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
				 <th>user name</th>
                  <th>users email</th>
                  <th>mobile</th>
                  <th>time</th>
                 <th>days</th>
                  <th>description</th>
				   <th>address</th>
                 <th>action</th>
                </tr>
              </thead>
              <tbody>
             @foreach( $mm as $order)
			  
                <tr class="gradeX">

                  <td class="center"> {{  $order->users_name  }}</td>
                  <td class="center"> {{  $order->users_email  }}</td>
                  <td class="center">{{  $order->mobile  }}</td>
             
				             <td class="center">
{{ $order->time }}
			  </td>	 
			  	  <td class="center">{{ $order->days }}</td>
				  <td class="center">{{ $order->description }}</td>
       	             <td class="center">
			  <input name="longitude" id="longitude" class="MapLon" value="{{ $order->address_latitude }}" type="text" placeholder="Longitude" class="form-control"  >
<input name="address_latitude" id="address_latitude" class="MapLon" value="{{ $order->address_longitude }}" type="text" placeholder="Longitude" class="form-control"  >
<div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>
			</td>
				<td class="center">
             
                   
					     <a href="#myModal{{$order->id}}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                  
                    
					
					</td>
      <div id="myModal{{ $order->id }}" class="modal hide">
                          <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">�</button>
                            <h3> Full Details</h3>
                          </div>
                          <div class="modal-body">
                           
                          </div>
                        </div>
                </tr>
				
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
const inputOptions = new Promise((resolve) => {
  setTimeout(() => {
    resolve({
      '#ff0000': 'Red',
      '#00ff00': 'Green',
      '#0000ff': 'Blue'
    })
  }, 1000)
})

const {value: color} = await Swal.fire({
  title: 'Select color',
  input: 'radio',
  inputOptions: inputOptions,
  inputValidator: (value) => {
    if (!value) {
      return 'You need to choose something!'
    }
  }
})

if (color) {
  Swal.fire({html: 'You selected: ' + color})
}
$(document).on('click','.deleteRecord',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover this Record Again!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete 	",
          closeOnConfirm: false
        },
        function(){
            window.location.href=+deleteFunction+"/"+id;
        });
    });
</script>
<script type="text/javascript">
     $(function () {
         var lat = 21.584370,
             lng = 39.217770,
             latlng = new google.maps.LatLng(lat, lng),
             image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
         //zoomControl: true,
         //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,
         var mapOptions = {
             center: new google.maps.LatLng(lat, lng),
             zoom: 13,
             mapTypeId: google.maps.MapTypeId.ROADMAP,
             panControl: true,
             panControlOptions: {
                 position: google.maps.ControlPosition.TOP_RIGHT
             },
             zoomControl: true,
             zoomControlOptions: {
                 style: google.maps.ZoomControlStyle.LARGE,
                 position: google.maps.ControlPosition.TOP_left
             }
         },
         map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
             marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 icon: image
             });
         var input = document.getElementById('searchTextField');
         var autocomplete = new google.maps.places.Autocomplete(input, {
             types: ["geocode"]
         });
         autocomplete.bindTo('bounds', map);
         var infowindow = new google.maps.InfoWindow();
         google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
             infowindow.close();
             var place = autocomplete.getPlace();
             if (place.geometry.viewport) {
                 map.fitBounds(place.geometry.viewport);
             } else {
                 map.setCenter(place.geometry.location);
                 map.setZoom(17);
             }
             moveMarker(place.name, place.geometry.location);
             $('.MapLat').val(place.geometry.location.lat());
             $('.MapLon').val(place.geometry.location.lng());
         });
         google.maps.event.addListener(map, 'click', function (event) {
             $('.MapLat').val(event.latLng.lat());
             $('.MapLon').val(event.latLng.lng());
             infowindow.close();
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         "latLng":event.latLng
                     }, function (results, status) {
                         console.log(results, status);
                         if (status == google.maps.GeocoderStatus.OK) {
                             console.log(results);
                             var lat = results[0].geometry.location.lat(),
                                 lng = results[0].geometry.location.lng(),
                                 placeName = results[0].address_components[0].long_name,
                                 latlng = new google.maps.LatLng(lat, lng);
                             moveMarker(placeName, latlng);
                             $("#searchTextField").val(results[0].formatted_address);
                         }
                     });
         });
        
         function moveMarker(placeName, latlng) {
             marker.setIcon(image);
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
             //infowindow.open(map, marker);
         }
     });
	 $(function(){
         $('#persondetail').ajaxForm({
            beforeSubmit: function() {

            },
            success: function(data) {
                // Maybe with maybe not.
                var data = JSON.parse(data);

                if(data['status'] == 'success') {
                    swal("Good job!", "You clicked the button!", "success");
                }
            }
        });

     });
</script>
</body>
</html>
</body>
