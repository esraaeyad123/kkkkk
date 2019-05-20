@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
  
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">View Categories</a> </div>
    <h1>Categories</h1>
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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>users_email</th>
                  <th>mobile</th>
                <th>time</th>
                  <th>worker id </th>
             <th>worker name </th>
                  <th>days </th>
				  <th>description </th>
                </tr>
              </thead>
              <tbody>
              
 @foreach( $orderr as $order)
                    
              <tbody>
			
                <tr class="gradeX">
                 
                   <td class="center"> {{  $order->users_email  }}</td>
                  <td class="center"> {{  $order->mobile  }}</td>
                    <td class="center">{{ $order->time }}</td>
						<td class="center">{{ $order->worker_id }}</td>
						<td class="center">{{ $order->worker_name }}</td>
					<td class="center">{{ $order->days }}</td>
					<td class="center">{{ $order->description }}</td>
						 
</tr>
    </tbody>
	
                     @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection