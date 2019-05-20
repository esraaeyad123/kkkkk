@extends('layouts.frontLayout.front_design')
@section('content')
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" >

  <script  src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">

                <div class="col-md-12 col-md-offset-0 text-center">

                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                            <h1 class="cursive-font">Thanks </h1>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>

</section>


<div class="container-fluid">

   
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h2>Reservations</h2>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
				 <th>number of order</th>
                  <th>price</th>
                  <th>Worker Name</th>
                
            
                  <th>description</th>
                  <th>date</th>
                  <th>days</th>
                <th>email</th>
           <th>action</th>  
               
                </tr>
              </thead>
			 @foreach((array) $order as $order)
                    
              <tbody>
			
                <tr class="gradeX">
                 
                   <td class="center"> {{  $order->users_email  }}</td>
                   <td class="center">{{ $order->worker_id }}</td>
                    <td class="center">{{ $order->time }}</td>
					<td class="center">{{ $order->days }}</td>
					<td class="center">{{ $order->description }}</td>
						  <td class="center">      <a  href=  rel1="delete_worker"  class="btn btn-danger btn-mini ">Delete</a>    </td>  
</tr>
    </tbody>
	
                     @endforeach	
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
