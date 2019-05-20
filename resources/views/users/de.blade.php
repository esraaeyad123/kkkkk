@extends('layouts.frontLayout.front_design')

   <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_bg_3.jpg)">
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
</head>
<body>
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">

                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                            <h1 class="cursive-font">Complete the reservation
</h1>
                        </div>

                    </div>

                </div>
            </div>
        </div>
 
    </header>@if(Session::has('flash_message_error'))
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
<!DOCTYPE html>
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

                                         



    <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 animate-box">

  <form  method="post" action="{{ url('/make-booking/ '. $deatails->id)  }}"
 >{{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col-md-12">
                               <h3 class="cursive-font">fill all of your informaion
</h3> 
                                                       
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="name">name</label>
                                    <input type="name" name="name" id="name" class="form-control" placeholder="Your name" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="Email">Email</label>
                                    <input type="Email" id="Email" name="user_email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="name">mobile</label>
                                    <input type="mobile" name="mobile" id="mobile" class="form-control" placeholder="Your moblie" required>
                                </div>
                            </div>
									
									 <div class="row form-group">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="name">Name</label>
                                             <select name="time" class="form-control" required >
											 <option value="" selected="selected" hidden="hidden">Choose Time</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
            </select>
                                        </div>

                                    </div>
									
									   <div class="row form-group">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="name">Time</label>
                                            <input type="date" name="datepicker" id="datepicker" class="form-control" required >
                                        </div>

                                    </div>
									
									   <div class="row form-group">
                                        <div class="col-md-12">
                                            
                                         <textarea name="description" id="description" class="form-control"required >Enter text here...</textarea>
                                        </div>

                                    </div>
									 <div class="row form-group">
                                        <div class="col-md-12">
                                            <input id="searchTextField" type="text" size="50" class="form-control"  placeholder="address">

         
            <input name="longitude" id="longitude" class="MapLon" value="" type="text" placeholder="Longitude" class="form-control"  required >
			      <input name="address_latitude" id="address_latitude" class="MapLon" value="" type="text" placeholder="Longitude" class="form-control"  required>

    <div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>
		   
		   </div>
		   </div>

									
									<div class="row form-group">
  <button   class="button " style="vertical-align:small"><span>Submit &#8594;</span></button>
</div> 

                       
                    </div>
                   
                </div>
            </div>
        </div>

	</form>
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
