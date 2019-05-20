@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home">
	</i> Home</a> <a href="#">worker</a> <a href="#" class="current">Edit Product</a> </div>
    <h1>worker</h1>
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
            <h5>Edit worker</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" 
			action="{{ url('Admin/Employees/edit_worker/'.$employeDetails->id) }}" name="edit_worker" 
id="edit_worker" novalidate="novalidate">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">categories_id	</label>
                <div class="controls">
                   <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="categories_id">
   @foreach($categories as $key=> $category)
   <option value="{{$key}}">{{$category}}</option>
     @endforeach

  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">firstname</label>
                <div class="controls">
                  <input type="text" name="firstname" id="firstname" value="{{ $employeDetails->firstname }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="text" name="email" id="email" value="{{ $employeDetails->email }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">mobile</label>
                <div class="controls">
                  <input type="text" name="mobile" id="mobile" value="{{ $employeDetails->mobile }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">days</label>
                <div class="controls">
                  <textarea name="days">
				  
				  @if (isset($employeDetails->days))
    {{{ json_encode($employeDetails->days) }}}
@endif
				 </textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">address</label>
                <div class="controls">
                  <textarea name="address">{{ $employeDetails->address }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{ $employeDetails->price }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">picture</label>
                <div class="controls">
                  <div id="uniform-undefined">
                    <table>
                      <tr>
                        <td>
                          <input name="picture" id="picture" type="file">
                          @if(!empty($employeDetails->picture))
                            <input type="hidden" name="current_image" value="{{ $employeDetails->picture }}"> 
                          @endif
                        </td>
                        <td>
                          @if(!empty($employeDetails->picture))
                            <img style="width:30px;" src="{{ asset('/images/backend_images/product/small/'.$employeDetails->picture) }}"> |
						<a href="{{ url('Admin/Employees/delete_worker_image/'.$employeDetails->id) }}">Delete Image</a>
                          @endif
                        </td>
                      </tr>
                    </table>
                </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Edit Worker" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection