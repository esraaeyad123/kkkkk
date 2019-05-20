@extends('layouts.frontLayout.front_design')
@section('content')

    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" >
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">

                <div class="col-md-12 col-md-offset-0 text-center">

                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <span class="intro-text-small">Hand-crafted by <a href="http://gettemplates.co" target="_blank">GetTemplates.co</a></span>
                            <h1 class="cursive-font">welcome to login page</h1>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>

    <div class="gtco-section">
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif

        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
         @endif
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 animate-box">
                        <h3>New User Signup!
                        </h3>
                        <form id="registerForm" name="registerForm" action="{{route('register')}}" method="POST" >
						{{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your firstname">
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your email address">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="password">password</label>
                                    <input type="password" id="myPassword" name="password" class="form-control" placeholder="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Signup</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-5 col-md-push-1 animate-box">

                        <div class="gtco-contact-info">
                            <h3>Login to your account</h3>
                            <ul>
                                <form name="loginForm" id="loginForm" action="{{route('login')}}" method="POST" >{{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Your email address">
                                        </div>
                                    </div>
 <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="password">password</label>
                                    <input type="password" id="myPassword" name="password" class="form-control" placeholder="password">
                                </div>
                            </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                                </form>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript"  src="http://code.jquery.com/jquery-1.10.1.min.js" >
	$(document).ready(function () {
   $("#registerForm").validate({
        rules:{
            name :{
                required:true ,
                minlength:6,
               accept:"[a-zA-Z]+",
            } ,
            password  :{
                required:true ,
                minlength:6,

            } ,
            email : {
                required: true,
                email: true,
               
            }
            } ,
            messages :{
                name :{
                    required :"رجاء ادخال الاسم كامل "   ,
                    minlength : "اسم يجب ان لايقل عن 6 احرف " ,
                    accept : "اسمك يجب  يكون فقط حروف"

  } ,
                password: {
                    required :"please enter your password "   ,
                    minlength : "please enter your email " ,

                } ,
                email: {
                    required :"please enter your email  "   ,
                    email : "please enter your valid email " ,
                    
                }

            } ,


    }) ; 
	
   
});

</script>
<script type="text/javascript" charset="utf-8" >
$(document).ready(function () {
   $("#registerForm").validate({
        rules:{
            name :{
                required:true ,
                minlength:6,
               accept:"[a-zA-Z]+",
            } ,
            password  :{
                required:true ,
                minlength:6,

            } ,
            email : {
                required: true,
                email: true,
               
            }
            } ,
            messages :{
                name :{
                    required :"Please enter  name "   ,
                    minlength : "shold be 10 charter " ,
                    accept : "your name accept just chartere"

  } ,
                password: {
                    required :"please enter your password "   ,
                    minlength : "should br 6 char" ,

                } ,
                email: {
                    required :"please enter your email  "   ,
                    email : "please enter your valid email " ,
                    
                }

            } ,


    }) ; 
	
   
});
	$(document).ready(function () {
   $("#loginForm").validate({
        rules:{
            
            password  :{
                required:true ,
                minlength:6,

            } ,
            email : {
                required: true,
                email: true,
               
            }
            } ,
            messages :{
               
                password: {
                    required :"please enter your password "   ,
                    minlength : "sould be 6 char " ,

                } ,
                email: {
                    required :"please enter your email  "   ,
                    email : "please enter your valid email " ,
                    
                }

            } ,


    }) ; 
	
    $('#myPassword').passtrength({
        minChars: 4,
        passwordToggle: true,
        tooltip: true ,
        eyeImg : "images/frontend_images/eye.svg" ,

    });
});
(function($, window, document, undefined) {

  var pluginName = "passtrength",
      defaults = {
        minChars: 8,
        passwordToggle: true,
        tooltip: true,
        textWeak: 'Weak',
        textMedium: 'Medium',
        textStrong: 'Strong',
        textVeryStrong: 'Very Strong',
        eyeImg : 'img/eye.svg'
      };

  function Plugin(element, options){
    this.element = element;
    this.$elem = $(this.element);
    this.options = $.extend({}, defaults, options);
    this._defaults = defaults;
    this._name = pluginName;
    _this      = this;
    this.init();
  }

  Plugin.prototype = {
    init: function(){
      var _this    = this,
          meter    = jQuery('<div/>', {class: 'passtrengthMeter'}),
          tooltip = jQuery('<div/>', {class: 'tooltip', text: 'Min ' + this.options.minChars + ' chars'})

      meter.insertAfter(this.element);
      $(this.element).appendTo(meter);

      if(this.options.tooltip){
        tooltip.appendTo(meter);
        var tooltipWidth = tooltip.outerWidth() / 2;
        tooltip.css('margin-left', -tooltipWidth)
      }

      this.$elem.bind('keyup keydown', function(event) {
          value = $(this).val();
          _this.check(value);
      });

      if(this.options.passwordToggle){
        _this.togglePassword();
      }

    },

    check: function(value){
      var secureTotal  = 0,
          chars        = 0,
          capitals     = 0,
          lowers       = 0,
          numbers      = 0,
          special      = 0;
          upperCase    = new RegExp('[A-Z]'),
          numbers      = new RegExp('[0-9]'),
          specialchars = new RegExp('([!,%,&,@,#,$,^,*,?,_,~])');

      if(value.length >= this.options.minChars){
        chars = 1;
      }else{
        chars = -1;
      }
      if(value.match(upperCase)){
        capitals = 1;
      }else{
        capitals = 0;
      }
      if(value.match(numbers)){
        numbers = 1;
      }else{
        numbers = 0;
      }
      if(value.match(specialchars)){
        special = 1;
      }else{
        special = 0;
      }

      secureTotal = chars + capitals + numbers + special;
      securePercentage = (secureTotal / 4) * 100;

      this.addStatus(securePercentage);

    },

    addStatus: function(percentage){
      var status = '',
          text = 'Min ' + this.options.minChars + ' chars',
          meter = $(this.element).closest('.passtrengthMeter'),
          tooltip = meter.find('.tooltip');

      meter.attr('class', 'passtrengthMeter');

      if(percentage >= 25){
        meter.attr('class', 'passtrengthMeter');
        status = 'weak';
        text = this.options.textWeak;
      }
      if(percentage >= 50){
        meter.attr('class', 'passtrengthMeter');
        status = 'medium';
        text = this.options.textMedium;
      }
      if(percentage >= 75){
        meter.attr('class', 'passtrengthMeter');
        status = 'strong';
        text = this.options.textStrong;
      }
      if(percentage >= 100){
        meter.attr('class', 'passtrengthMeter');
        status = 'very-strong';
        text = this.options.textVeryStrong;
      }
      meter.addClass(status);
      if(this.options.tooltip){
        tooltip.text(text);
      }
    },

    togglePassword: function(){
      var buttonShow = jQuery('<span/>', {class: 'showPassword', html: '<img src="'+ this.options.eyeImg +'" />'}),
          input      =  jQuery('<input/>', {type: 'text'}),
          passwordInput      = this;

      buttonShow.appendTo($(this.element).closest('.passtrengthMeter'));
      input.appendTo($(this.element).closest('.passtrengthMeter')).hide();

      $(this.element).bind('keyup keydown', function(event) {
          input.val($(passwordInput.element).val());
      });

      input.bind('keyup keydown', function(event) {
          $(passwordInput.element).val(input.val());
          value = $(this).val();
          _this.check(value);
      });

      $(document).on('click', '.showPassword', function(e) {
        buttonShow.toggleClass('active');
        input.toggle();
        $(passwordInput.element).toggle();
      });
    }
  }

  $.fn[pluginName] = function(options) {
      return this.each(function() {
          if (!$.data(this, "plugin_" + pluginName)) {
              $.data(this, "plugin_" + pluginName, new Plugin(this, options));
          }
      });
  };

})(jQuery, window, document);

</script>
@endsection
