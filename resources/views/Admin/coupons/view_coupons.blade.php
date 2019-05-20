@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Coupons</a> <a href="#" class="current">View Coupons</a> </div>
    <h1>Coupons</h1>
    @if(Session::has('flash_message_error'))
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="jquery.json-2.4.min.js" type="text/javascript"></script>

<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script> <script src="js/jquery-ui.js" type="text/javascript"></script> <script src="js/ble.js" type="text/javascript"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/app.js" type="text/javascript"></script>
<script src="js/form.js" type="text/javascript"></script>
<script src="js/create.js" type="text/javascript"></script>
<script src="js/tween.js" type="text/javascript"></script>
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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Coupons</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Coupon Code</th>
				
                  <th>value</th>
                   <th>type</th>
                  <th>Expiry Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td class="center">{{ $coupon->id }}</td>
                  <td class="center">{{ $coupon->coupon_code }}</td>
                  <td class="center">{{ $coupon->value }}</td>
                  <td class="center">{{ $coupon->amount_type }}</td>
                  <td class="center">{{ $coupon->expiry_date }}</td>
                  <td class="center">@if($coupon->status==1) Active @else Inactive @endif</td>
                  <td class="center"> 
                    <a href="{{ url('/Admin/edit_coupon/'.$coupon->id) }}" class="btn btn-primary btn-mini">Edit</a> 
        
				   <a href="{{ url('/Admin/delete_coupon/'. $coupon->id) }}" class="btn btn-danger btn-mini" >Delete </a>
				  

				 
                  </td>
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
<script type="text/javascript" >

</script>

@endsection