@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Worker</a> <a href="#" class="current">View Worker</a> </div>
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
            <h5>Worker</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Worker ID</th>
                  <th>service Name</th>
                  <th>Worker first Name</th>
            
                  <th>days</th>
                  <th>email</th>
                  <th>address</th>
                  <th>price</th>
				   <th>image</th>
				   <th>action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($employe as $employe)
              
			  
                <tr class="gradeX">

                  <td class="center">{{ $employe->id }}</td>
                  <td class="center">{{ $employe->category_name}}</td>
                  <td class="center">{{ $employe->firstname}}</td>
             
				             <td class="center">
	@if (isset($employe->days))
    {{{ json_encode($employe->days) }}}
@endif
			  </td>	 
			  	  <td class="center">{{ $employe->email }}</td>
				  <td class="center">{{ $employe->address }}</td>
       	          <td class="center">{{ $employe->price }}</td>       
			  
			  <td class="center">
                    @if(!empty($employe->picture))
                    <img src="{{ asset('/images/backend_images/product/small/'.$employe->picture) }}" style="width:50px;">
                    @endif
                  </td>
				<td class="center">
             
                    <a href="{{ url('Admin/Employees/edit_worker/'.$employe->id) }}" class="btn btn-primary btn-mini">Edit</a> 
					     <a href="#myModal{{ $employe->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                  
                    <a  href="{{ url('Admin/Employees/delete_worker/'.$employe->id) }}"  rel1="delete_worker"  class="btn btn-danger btn-mini ">Delete</a>
					
					</td>
 
                        <div id="myModal{{ $employe->id }}" class="modal hide">
                          <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">�</button>
                            <h3>{{ $employe->firstname }} Full Details</h3>
                          </div>
                          <div class="modal-body">
                            <p>worker ID: {{ $employe->id }}</p>
                            <p>worker ID: {{ $employe->categories_id }}</p>
                            <p>worker First Name: {{ $employe->firstname }}</p>
                            <p>worker last Name: {{ $employe->lastname }}</p>
                            <p>Price: {{ $employe->price }}</p>
                            <p>first created: {{ $employe->created_at }}</p>
                             <p>last updated : {{ $employe->updated_at }}</p>
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

@endsection
