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
                            <h1 class="cursive-font">welcome to Make Your Account </h1>
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
  
  
  
  <div class="col-md-5 col-md-push-1 animate-box">

                        <div class="gtco-contact-info">
                            <h3>Make Your Account </h3>
                            <ul>
                                <form name="loginForm" id="loginForm" action="{{url('/worker-register')}}" method="POST" >{{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="name">Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="Your firstname">
                                        </div>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label class="sr-only" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Your email address">
                                        </div>
                                    </div>
 <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="password">id </label>
                                    <input type="id" id="myPassword" name="id" class="form-control" placeholder="id">
                                </div>
                            </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Go To Complete </button>
                                    </div>
                                    
                                </form>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div><script type="text/javascript" src="js/frontend_js/jquery.min.js"></script>
<script>
$().ready(function () {
   $("#registerForm").validate({
        rules:{
            name :{
                required:true ,
                minlength:2,
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
                    required :"رجاء ادخال رقم السري "   ,
                    minlength : "كلمه السر يجب ان لا تقل عن 6 احرف " ,

                } ,
                email: {
                    required :"رجاء كتابه الايميل "   ,
                    email : "ادخال ايميل صحيح " ,
                    
                }

            } ,


    }) ;
	$().ready(function () {
   $("#loginForm").validate({
        rules:{
            name :{
                required:true ,
                minlength:2,
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
    $('#myPassword').passtrength({
        minChars: 4,
        passwordToggle: true,
        tooltip: true ,
        eyeImg : "images/frontend_images/eye.svg" ,

    });
});
;(function($, window, document, undefined) {

  var pluginName = "passtrength",
      defaults = {
        minChars: 8,
        passwordToggle: true,
        tooltip: true,
        textWeak: "Weak",
        textMedium: "Medium",
        textStrong: "Strong",
        textVeryStrong: "Very Strong",
        eyeImg : "images/frontend_images/eye.svg"
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
          meter    = jQuery("<div/>", {class: "passtrengthMeter"}),
          tooltip = jQuery("<div/>", {class: "tooltip", text: "Min " + this.options.minChars + " chars"});

      meter.insertAfter(this.element);
      $(this.element).appendTo(meter);

      if(this.options.tooltip){
        tooltip.appendTo(meter);
        var tooltipWidth = tooltip.outerWidth() / 2;
        tooltip.css("margin-left", -tooltipWidth);
      }

      this.$elem.bind("keyup keydown", function() {
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
          numbers      = 0,
          special      = 0;
          upperCase    = new RegExp("[A-Z]"),
          numbers      = new RegExp("[0-9]"),
          specialchars = new RegExp("([!,%,&,@,#,$,^,*,?,_,~])");

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
      var status = "",
          text = "Min " + this.options.minChars + " chars",
          meter = $(this.element).closest(".passtrengthMeter"),
          tooltip = meter.find(".tooltip");

      meter.attr("class", "passtrengthMeter");

      if(percentage >= 25){
        meter.attr("class", "passtrengthMeter");
        status = "weak";
        text = this.options.textWeak;
      }
      if(percentage >= 50){
        meter.attr("class", "passtrengthMeter");
        status = "medium";
        text = this.options.textMedium;
      }
      if(percentage >= 75){
        meter.attr("class", "passtrengthMeter");
        status = "strong";
        text = this.options.textStrong;
      }
      if(percentage >= 100){
        meter.attr("class", "passtrengthMeter");
        status = "very-strong";
        text = this.options.textVeryStrong;
      }
      meter.addClass(status);
      if(this.options.tooltip){
        tooltip.text(text);
      }
    },

    togglePassword: function(){
      var buttonShow = jQuery("<span/>", {class: "showPassword", html: "<img src="+ this.options.eyeImg +" />"}),
          input      =  jQuery("<input/>", {type: "text"}),
          passwordInput      = this;

      buttonShow.appendTo($(this.element).closest(".passtrengthMeter"));
      input.appendTo($(this.element).closest(".passtrengthMeter")).hide();

      $(this.element).bind("keyup keydown", function() {
          input.val($(passwordInput.element).val());
      });

      input.bind("keyup keydown", function() {
          $(passwordInput.element).val(input.val());
          value = $(this).val();
          _this.check(value);
      });

      $(document).on("click", ".showPassword", function() {
        buttonShow.toggleClass("active");
        input.toggle();
        $(passwordInput.element).toggle();
      });
    }
  };

  $.fn[pluginName] = function(options) {
      return this.each(function() {
          if (!$.data(this, "plugin_" + pluginName)) {
              $.data(this, "plugin_" + pluginName, new Plugin(this, options));
          }
      });
  };

})(jQuery, window, document);
!function(a,b,c,d){function e(b,c){this.element=b,this.$elem=a(this.element),this.options=a.extend({},g,c),this._defaults=g,this._name=f,_this=this,this.init()}var f="passtrength",g={minChars:8,passwordToggle:!0,tooltip:!0,textWeak:"Weak",textMedium:"Medium",textStrong:"Strong",textVeryStrong:"Very Strong",eyeImg:"img/eye.svg"};e.prototype={init:function(){var b=this,c=jQuery("<div/>",{class:"passtrengthMeter"}),d=jQuery("<div/>",{class:"tooltip",text:"Min "+this.options.minChars+" chars"});if(c.insertAfter(this.element),a(this.element).appendTo(c),this.options.tooltip){d.appendTo(c);var e=d.outerWidth()/2;d.css("margin-left",-e)}this.$elem.bind("keyup keydown",function(){value=a(this).val(),b.check(value)}),this.options.passwordToggle&&b.togglePassword()},check:function(a){var b=0,c=0,d=0,e=0,f=0;upperCase=new RegExp("[A-Z]"),e=new RegExp("[0-9]"),specialchars=new RegExp("([!,%,&,@,#,$,^,*,?,_,~])"),c=a.length>=this.options.minChars?1:-1,d=a.match(upperCase)?1:0,e=a.match(e)?1:0,f=a.match(specialchars)?1:0,b=c+d+e+f,securePercentage=b/4*100,this.addStatus(securePercentage)},addStatus:function(b){var c="",d="Min "+this.options.minChars+" chars",e=a(this.element).closest(".passtrengthMeter"),f=e.find(".tooltip");e.attr("class","passtrengthMeter"),b>=25&&(e.attr("class","passtrengthMeter"),c="weak",d=this.options.textWeak),b>=50&&(e.attr("class","passtrengthMeter"),c="medium",d=this.options.textMedium),b>=75&&(e.attr("class","passtrengthMeter"),c="strong",d=this.options.textStrong),b>=100&&(e.attr("class","passtrengthMeter"),c="very-strong",d=this.options.textVeryStrong),e.addClass(c),this.options.tooltip&&f.text(d)},togglePassword:function(){var b=jQuery("<span/>",{class:"showPassword",html:"<img src="+this.options.eyeImg+" />"}),d=jQuery("<input/>",{type:"text"}),e=this;b.appendTo(a(this.element).closest(".passtrengthMeter")),d.appendTo(a(this.element).closest(".passtrengthMeter")).hide(),a(this.element).bind("keyup keydown",function(){d.val(a(e.element).val())}),d.bind("keyup keydown",function(){a(e.element).val(d.val()),value=a(this).val(),_this.check(value)}),a(c).on("click",".showPassword",function(){b.toggleClass("active"),d.toggle(),a(e.element).toggle()})}},a.fn[f]=function(b){return this.each(function(){a.data(this,"plugin_"+f)||a.data(this,"plugin_"+f,new e(this,b))})}}(jQuery,window,document);
</script>
@endsection
