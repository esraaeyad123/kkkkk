@extends('layouts.adminLayout.admin_design')
@section('content')
<link href="weekDays.css" rel="stylesheet" type="text/css">
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Worker</a> <a href="#" class="current">Add Worker</a> </div>
    <h1>Worker</h1>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype= "multipart/form-data" class="form-horizontal" method="post" action="{{ url('/Admin/Employees/add_worker') }}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="categories_id">
   @foreach($categories as $key=> $category)
   <option  value="{{$key}}">{{$category}}</option>


   @endforeach

  </select>

                </div>
              </div>
              <div class="control-group">
                <label class="control-label">First Name</label>
                <div class="controls">
                  <input type="text" name="firstname" id="firstname">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">last Name</label>
                <div class="controls">
                  <input type="text" name="lastname" id="lastname">
                </div>
              </div>
			                <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="Email" name="Email" id="Email">
                </div>
              </div>
			     
			             <div class="control-group">
                <label class="control-label">Phone / xEx <small class="text-muted">(999) 999-9999 / x999999</small></label>
                <div class="controls">
                  <input type="text" name="mobile" id="mobile">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">address</label>
                <div class="controls">
                  <input type="text" name="address" id="address">
                </div>
              </div>
             
            
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">picture</label>
                <div class="controls">
                  <div class="uploader" id="uniform-undefined"><input name="picture" id="picture" type="file" size="19" style="opacity: 0;">
				  <span class="filename">No file selected</span><span class="action">Choose File</span></div>
                </div>
              </div>
			 
			  <div class="control-group">
			  
			  
<label class="control-label">days </label>
                    <div class="weekDays-selector"name="days">

  <input type="checkbox" id="weekday-mon" class="weekday" name="days[]" value="Saturday "  /> 
  <label for="weekday-mon">Sat</label>
  <input type="checkbox" id="weekday-tue" class="weekday" name="days[]" value="Thursday"/>
  <label for="weekday-tue">Thu</label>
  <input type="checkbox" id="weekday-wed" class="weekday" name="days[]" value="Tuesday"  > 
  <label for="weekday-wed">Tue</label>
  <input type="checkbox" id="weekday-thu" class="weekday" name="days[]"value="Sunday"  />
  <label for="weekday-thu">Sun</label>
  <input type="checkbox" id="weekday-fri" class="weekday" name="days[]"value="Friday"  />
  <label for="weekday-fri">Fri</label>
  <input type="checkbox" id="weekday-sat" class="weekday" name="days[]"value="Wednesday"  />
  <label for="weekday-sat">Wed</label>
  <input type="checkbox" id="weekday-sun" class="weekday" name="days[]"value="Monday"  />
  <label for="weekday-sun">Mon</label>
  
  </div>
</div>
	 


			<div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  

@endsection
