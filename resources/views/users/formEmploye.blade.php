@extends('layouts.frontLayout.front_design')
@section('content')

    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_bg_3.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">

                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                            <h1 class="cursive-font">للتواصل</h1>
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
                        <h3>Get In Touch</h3>
                        <form  action="{{ url('/contact') }}"  method="post" enctype="multipart/form-data" name="form1"> {{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="name">full Name</label>
                                    <input type="text" name ="fullname"id="fullname" class="form-control" placeholder="Your firstname">
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="name">Number Phone</label>
                                    <input type="text" id="mobile" class="form-control" placeholder="Your Number Phone">
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">

                                    <select name="cate" id="activities" class="form-control">
                                        <option value="">اختيار مهنه </option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Your email address">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="message">Message</label>
                                    <textarea name="inf" id="inf" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
                                </div>
                            </div>


                                <label for="upload_file" class="control-label col-sm-3">Upload File</label>
                               <div class='file-input'>
  <input type='file'>
  <span class='button'>Choose</span>
  <span class='label' data-js-label>No file selected</label>
</div>

                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary">
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
                </div>
            </div>
        </div>
    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
	<script>
	
	
	</script >

@endsection
