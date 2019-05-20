  <html>
    <head>
        <script src="https://js.stripe.com/v3/"></script>
        
        <style>
        @font-face {
  font-family: 'Open Sans';
  font-weight: 400;
  src: local("Open Sans"), local("OpenSans"), url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3ZBw1xU1rKptJj_0jans920.woff2) format("woff2");
  unicodeRange: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
}
* {
  font-family: "Open Sans", "Helvetica Neue", Helvetica, sans-serif;
  font-size: 15px;
  font-variant: normal;
  padding: 0;
  margin: 0;
}
html {
  height: 100%;
}
body {
  background: #F6F9FC;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100%;
}
form {
  width: 480px;
  margin: 20px 0;
}
label {
  position: relative;
  color: black;
  font-weight: 400;
  height: 48px;
  line-height: 48px;
  margin-bottom: 10px;
  display: flex;
  flex-direction: row;
}
label > span {
  width: 115px;
}
.field {
  background: white;
  box-sizing: border-box;
  font-weight: 400;
  border: 1px solid #CFD7DF;
  border-radius: 0px;
  color: #32315E;
  outline: none;
  flex: 1;
  height: 48px;
  line-height: 48px;
  padding: 0 20px;
  cursor: text;
}
.field::-webkit-input-placeholder { color: #CFD7DF; }
.field::-moz-placeholder { color: #CFD7DF; }
.field:focus,
.field.StripeElement--focus {
  border-color:  burlywood;
}
button {
  float: left;
  display: block;
    background-color: darksalmon;
  box-shadow: 0 1px 2px 0 rgba(0,0,0,0.10), inset 0 -1px 0 0 #E57C45;
  color: white;
  border-radius: 10px;
  border: 0;
  margin-top: 20px;
  font-size: 17px;
  font-weight: 500;
  width: 100%;
  height: 48px;
  line-height: 48px;
  outline: none;
}
button:focus {
  background-color: burlywood;
}
button:active {
 background-color: burlywood;
}
.outcome {
  float: left;
  width: 100%;
  padding-top: 8px;
  min-height: 20px;
  text-align: center;
}
.success, .error {
  display: none;
  font-size: 13px;
}
.success.visible, .error.visible {
  display: inline;
}
.error {
  color: #E4584C;
}
.success {
  color: #F8B563;
}
.success .token {
  font-weight: 500;
  font-size: 13px;
}
   </style>
      </head>
   
 
<body>
 <form action="{{url('checkout')}}" method="post" id="payment-form">
    <label>
      <span>Name</span>
      <input name="name" class="field" placeholder="Jane Doe" />
    </label>
	 <label>
      <span>work id</span>
      <input name="worker_id" class="field" placeholder="Jane Doe" />
    </label>
    <label>
      <span>Email</span>
      <input class="field" placeholder="Email" name="Address" type="tel" />
    </label>
    <label>
      <span>Phone</span>
      <input name="address-zip" class="field" placeholder="(123) 456-7890" />
    </label>
    <label>
      <span>Card</span>
      <div id="card-element" class="field"></div>
    </label>
      {{ csrf_field() }}
    <button type="submit">Pay </button>
    <div class="outcome">
     <div id="card-errors" role="alert"></div>
   
     
    </div>
  </form>


       <script>
    
       var stripe = Stripe('pk_test_vL2fAUE5klHj7nLmJ35703YV');
        
 var elements = stripe.elements({
  fonts: [
    {
      family: 'Open Sans',
      weight: 400,
      src: 'local("Open Sans"), local("OpenSans"), url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3ZBw1xU1rKptJj_0jans920.woff2) format("woff2")',
      unicodeRange: 'U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215',
    },
  ]
});
var card = elements.create('card', {
  hidePostalCode: true,
  style: {
    base: {
      iconColor: '#F99A52',
      color: '#32315E',
      lineHeight: '48px',
      fontWeight: 400,
      fontFamily: '"Open Sans", "Helvetica Neue", "Helvetica", sans-serif',
      fontSize: '15px',
      '::placeholder': {
        color: '#CFD7DF',
      }
    },
  }
});
card.mount('#card-element');
              
            card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
            
          
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
     
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
    
      stripeTokenHandler(result.token);
    }
  });
});
            
     function stripeTokenHandler(token) {
  
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
 
  form.submit();}
    </script> 
    </body>
</html>