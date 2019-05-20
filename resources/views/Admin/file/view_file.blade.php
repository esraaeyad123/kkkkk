@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
      <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">File CV</a> <a href="#" class="current">View CV</a> </div>
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



	
	<h1>Worker</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">�</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">�</button> 
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
            <h5>File CV</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Upload Date</th>
                  <th>Worker first Name</th>
            
                 
                  <th>email</th>
                 
				   <th>Mobile</th>
				   <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach( $downloads as $down)
              
			  
                <tr class="gradeX">

                  <td class="center">{{  $down->id }}</td>
                  <td class="center">{{  $down->created_at}}</td>
                  <td class="center">{{  $down->fullname}}</td>
             
		 
			  	  <td class="center">{{ $down->email }}</td>
				  <td class="center">{{ $down->mobile}}</td>
       	               
			  
			
				<td class="center">
             
                    
					   <a href="/download/{{ $down->name }}" download="/dowanload/{{ $down->name }}"> <button type="button" class="btn btn-primary btn-mini ">Dowanload</button></a>
                  
                    <a   href="{{ url('/Admin/file/view_file/delete_file/'. $down->id) }}"   class="btn btn-danger btn-mini ">Delete</a>
					
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

@endsection
