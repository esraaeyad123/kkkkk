<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;

use Illuminate\Support\Facades\Route;
use App\Coupon;
use App\User;
use App\cart;
use Illuminate\Support\Facades\Session;

use DB;
use Auth ;
use App\sendToWoker;
use App\Employe;
use Stripe\Stripe;

class cartController extends Controller
{
	
	// function to show page worker in front 
    public function addtocart(Request $request, $id)
	
    {  
	
	return view('users.de')->with([
	'deatails' => Employe::findOrFail($id) 
	
	
	
 ]);

    }
//take all info from users and info about the worker who selectin it and store in database . 
// sure if there no conflict with other
    public function makebooking(Request $request, $id = null)
	
	
    {// $deatails = Employee::where('id')->first(array('employeeID','email','fullName'));
	if(Auth::check()){
        $user_email = Auth::user()->email;
        $name = Employe::where(['id' => $id])->first()->firstname;
        $id = Employe::where(['id' => $id])->first()->id;
 $price = Employe::where(['id' => $id])->first()->price;
        if ($request->isMethod('post')) {
            $data = $request->all();
}

$session_id = Session::get('session_id');

     
        

        if (empty($session_id)) {
            $session_id = str_random(40);

            Session::put('session_id', $session_id);
			
        }
		
		 $orders=Order::orderBy('id','DESC')->first()->cart;
	
		$mm=unserialize( $orders);
		$employe = json_decode(json_encode($mm,true));

		//dd($employe) ; die;
			$time=$mm[0]->time ;
			$days=$mm[0]->days ;
			$idW=$mm[0]->worker_id ;
	//dd($idW) ; die ;
$countProducts = DB::table('cart')->where([ 'worker_id'=> $id ,'worker_name' => $name, 'days' => $data['datepicker'], 'days' => $days, 'time' => $data['time'],  'session_id' => $session_id])->count() ;
        if ($countProducts > 0) {
            return redirect()->back()->with('flash_message_error', 'worker already exist in Cart! or busy');
        } elseif ($idW==$id && $days ==$data['datepicker'] && $time==  $data['time'] ){
			  return redirect()->back()->with('flash_message_error', 'worker already exist in Cart! or busy');
		}
		
		else {

            DB::table('cart')->insert(['worker_id' => $id, 'worker_name' => $name, 'price' => $price, 'users_name' => $data['name'], 'description' => $data['description'],
     'mobile' => $data['mobile'],'days' => $data['datepicker'], 'time' => $data['time'], 'users_email' => $data['user_email'], 'address_longitude' => $data['longitude'],
                'address_latitude' => $data['address_latitude'],
                'session_id' => $session_id]);

            return redirect('cart')->with('flash_message_success', 'order become in your cart');
        }
        

        return view('users.de', compact('deatails', 'price', 'name'));
}
	else{
		
	 return redirect('login_register')->with('flash_message_error', 'you should log in or sing up');
	}
    }

	// show his request to own page
    public function cart()
    {
		
		  
		 $session_id = Session::get('session_id');

        if(Auth::check()){
			
        $user_email = Auth::user()->email;
		$user_Cart = DB::table('cart')->where(['session_id' => $session_id] )->get();
		
		
	//	dd($user_Cart) ; die;
   // $user_Cart = DB::table('cart')->where(['users_email' => $user_email])->get();
	
   } 
       
        return view('users.cart')->with(compact('user_Cart'));
    }



    public function deleteCart($id = null)
    {
		
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where('id', $id)->delete();
		
		
        return redirect('cart')->with('flash_message_success', ' has been deleted in Cart!');
    }
// there are all case about Coupon
    public function applyCoupon(Request $request)
    {

          Session::forget('CouponAmount');
            Session::forget('CouponCode');

        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $couponCount = Coupon::where('coupon_code', $data['coupon_code'])->count();
        if ($couponCount == 0) {
            return redirect()->back()->with('flash_message_error', 'This coupon does not exists!');
        } else {
            // with perform other checks like Active/Inactive, Expiry date..

            // Get Coupon Details
            $couponDetails = Coupon::where('coupon_code', $data['coupon_code'])->first();

            // If coupon is Inactive
            if ($couponDetails->status == 0) {
                return redirect()->back()->with('flash_message_error', 'This coupon is not active!');
            }

            // If coupon is Expired
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');
            if ($expiry_date < $current_date) {
                return redirect()->back()->with('flash_message_error', 'This coupon is expired!');
            }

            // Coupon is Valid for Discount

            // Get Cart Total Amount
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
    //dd($userCart); die ;
            $total_amount = 0;
            foreach ($userCart as $item) {
                $total_amount = $total_amount + ($item->price);
            }
			
			
           
           
            // Check if amount type is Fixed or Percentage
            if ($couponDetails->amount_type == "Percentage") {
                $vaule = $total_amount * ($couponDetails->value) / 100;
                $couponAmount = $total_amount - $vaule;
            } else {
                $vaule = $total_amount * $couponDetails->value / 100;
                $couponAmount = $total_amount - $vaule;

            }
			
            // Add Coupon Code & Amount in Session
            Session::put('CouponAmount', $couponAmount);
            Session::put('CouponCode', $data['coupon_code']);

            return redirect()->back()->with('flash_message_success', 'Coupon code successfully
                applied. You are availing discount!');

        }
		
         //return redirect()->back()->with('total_amount','couponAmount');
		     return view('users.cart')->with(compact('total_amount','couponAmount'));

    }
  
 public function checkout (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            // Get Shipping Address of User
            
          // echo "<pre>"; print_r($data); die;
            if(empty(Session::get('CouponCode'))){
               $coupon_code = ''; 
            }else{
               $coupon_code = Session::get('CouponCode'); 
            }
            if(empty(Session::get('CouponAmount'))){
               $coupon_amount = ''; 
            }else{
               $coupon_amount = Session::get('CouponAmount'); 
            }
			//  $id = Cart::where(['id' => $id])->first()->worker_id;
			
		     // $cart = DB::table('cart')->where(['session_id' => $session_id] )->get();
		
    $cart = DB::table('cart')->where(['users_email' => $user_email])->get();
$id = DB::table('cart')->where(['users_email' => $user_email])->get();
		
		//	echo "<pre>"; print_r( $id); die;
               // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_Fc5iCK1FKpkwLB5H4oAAwgVO");
// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
//$token = $_POST['stripeToken'];
//$token  = $_POST['stripeToken'];
if (isset($_POST['stripeToken'])){

        $token = $_POST['stripeToken'];

// Create a Customer
$customer = \Stripe\Customer::create(array(
  "source" => $token,
  "description" => "Example customer")
);
$charge = \Stripe\Charge::create([
    'amount' => 1* 100,
    'currency' => 'usd',
    'description' => 'Example charge',
    'customer' => $customer->id ,
    'capture' => false,
]);
// echo "<pre>"; print_r( $charge); die;
       $order= new Order();
       $order->cart = serialize($cart);
       $order->address = $request->input('Address');
       $order->user_id = $request->input('worker_id');
	    $order->name = $request->input('name');
       $order->payment_id = $charge->id;
	   $order->save();

       
       Session::forget('cart');
		
			$user_email = Auth::user()->email;
        DB::table('cart')->where('users_email',$user_email)->delete();
			     

		}
	
		}
		 return view('users.thanks');
	 } 
	// after payment delet from cart table to send to order table
	 public function thanks(Request $request){
		 
        $user_email = Auth::user()->email;
	
        DB::table('cart')->where('users_email',$user_email)->delete();
 return view('users.thanks');
    }
	
	// // show all order after payment to worker
	 public function workerPage(Request $request){
		  $admin = Auth::user()->admin;
		  
		  if($admin != 0){
//$worker_order = DB::table('Orders')->where(['user_id' =>  $admin] )->first()->cart;
		$worker_order = Order::where(['user_id' =>  $admin] )->first()->cart;

			$mm=unserialize($worker_order );
			


  
return view('users.worker_account',compact('mm'));
			 
            }
             return redirect('login_register')->with('flash_message_error', 'you are not allow to access');
            }
			
			//  // show all order after payment there are no delete sure 
			public function userAccount(Request $request){
	$email = Auth::user()->email;
	$user_account = Order::where(['address' =>  $email] )->first()->cart;

			$mm=unserialize($user_account );
			$e=$mm[0]->users_email ;
 
return view('users.user_account',compact('mm'));
			 
            }
             
  
	


  
  // show all order after payment to admin
		 public function viewOrders(){
        $orders=Order::orderBy('id','DESC')->first()->cart;
	
		$orderr=unserialize( $orders);

 return view('Admin.order.view-orders')->with(compact('orderr'));
		
    }
		
	
	
	
}