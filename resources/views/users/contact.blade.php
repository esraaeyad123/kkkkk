@extends('layouts.frontLayout.front_design')
@section('content')

    	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" >
		
		<div class="gtco-container">
			<div class="row">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
			<link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.css">
				<div class="col-md-12 col-md-offset-0 text-center">

					<div class="row row-mt-15em">
						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
							<h1 class="cursive-font">Say hello!    Contact us   </h1>	
										
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>

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

    <div class="gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 animate-box">
                        <h3>Jobs and send CV
 
</h3>
                        <form  action="{{route('upload.file')}}"  method="post" enctype="multipart/form-data" name="form"> 
					
                {{csrf_field()}}

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" name="fullname">full Name</label>
                                    <input type="text" name ="fullname"id="fullname" class="form-control" placeholder="Your firstname">
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" name="mobile">Number Phone</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Your Number Phone">
                                </div>

                            </div>
                            <div class="row form-group">
                                <div   class="col-md-12">

                                    <select name="cate"  form="usrform" id="cate" class="form-control">
                                        <option value="">jops </option>
                                        <option value="">plumber</option>
                                        <option value="">electrician</option>
                                        <option value="">cleaner</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" name="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Your email address">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" name="message">Message</label>
                                    <textarea name="inf" id="inf" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
                                </div>
                            </div>

<div class="row form-group">
                                <label for="upload_file" class="control-label col-sm-3">Upload File</label>
                                <div class="col-sm-9">
                                    <div class="uploader" id="uniform-undefined">
									
								
                                        <input type ="file" name="file" class="filename"> </input><span class="action"></span></div>
                                </div>
</div>
   <div class="row form-group">
  <button   class="button" ><span>Submit &#8594;</span></button>
  
</div>

                        </form>
                    </div>
                    <div class="col-md-5 col-md-push-1 animate-box">

                        <div class="gtco-contact-info">
                            <h3>Contact Information</h3>
                            <ul>
                                <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
                                <li class="phone"><a href="tel://1234567920">+ 1235 2355 98</a></li>
                                <li class="email"><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                                <li class="url"><a href="http://FreeHTML5.co">FreeHTML5.co</a></li>
                            </ul>
                        </div>


                    </div>
					  <div class="col-md-5 col-md-push-1 animate-box">

                        <div class="gtco-contact-info">
                            
                            <ul>
							  <div class="row form-group">
                                 <div class="col-md-12">
                                    <label class="sr-only" name="fullname">full Name</label>
                                    <input type="text" name ="fullname"id="fullname" class="form-control" placeholder="enter num of oreder" >
                                </div>
                              </div>
 
 
 
  
   <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" name="message">Message</label>
                                    <textarea name="inf" id="inf" cols="5" rows="5" class="form-control" placeholder="your Commend"></textarea>
                                </div>
                            </div>
							  <div class="col-md-12">
                                    <label class="sr-only" name="fullname">button</label>
                                    <button onclick="ask()" type='button' class='btn btn-primary'>Rate Me!</button>
                                </div>


                            </ul>
                        </div>


                    </div>
					
            </div>
        </div>
    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
	<script  type="text/css" >
body {
  display:flex;
  width: 100%;
  height: 100vh;
  justify-content:center;
  align-items:center;
}


	
	</script>
<script type="text/javascript" >

	
function ask() {
  let wrap = document.createElement('div');
  wrap.setAttribute('class', 'text-muted');
  wrap.innerHTML = '<button onclick="reply(\'sad\')" type="button" value="sad" class="btn feel"><i class="fa fa-frown-o fa-3x"></i></button><button onclick="reply(\'neutral\')" type="button" value="neutral" class="btn feel"><i class="fa fa-meh-o fa-3x"></i></button><button onclick="reply(\'happy\')" type="button" value="happy" class="btn feel"><i class="fa fa-smile-o fa-3x"></i></button><hr>'
  
  swal({
    title: "",
    text: "How do you like the new features?",
    icon: "info",
    className: '',
    closeOnClickOutside: false,
    content: {
      element: wrap
    },
    buttons: {
      confirm: {
        text: "Close",
        value: '',
        visible: true,
        className: "btn btn-default",
        closeModal: true,
      }
    },
  }).then((value) => {
    if (value === 'sad') {
      swal("Sorry!", {
        icon: "error",
        buttons: false
      });
    } else if (value === 'neutral') {
      swal("Okay!", {
        icon: "warning",
        buttons: false
      });
    } else if (value === 'happy') {
      swal("Hooray!", {
        icon: "success",
        buttons: false
      });
    }
  });
}

function reply(feel){
  swal.setActionValue(feel);
}
$('.btn').click(function(){  
    swal({
			title: 'Awesome !',
			text: 'form submitted successfully !',
			type: 'success'
		});
});

</script>
@endsection
