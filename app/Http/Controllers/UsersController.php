<?php

namespace App\Http\Controllers;
use App\User ;
use Illuminate\Http\Request;
use Auth ;
use Illuminate\Support\Facades\Redirect;
use Session; 
use App\Employe;
use DB;

class UsersController extends Controller
{

    public function usersLoginRegister(){
  //echo "tuuu"; die ;
  // return redirect('/myaccount');
    return view('users.login_register');
 
    }
	
	
	public function workerLoginRegister(){

    return view('users.worker_login');
     }
	 
	 
	
       public function workerregister (Request $request){
           if($request->isMethod('post')) {
            $data = $request->all() ;
   $userCount = DB::table('employees')->where(['email' => $data['email'],'id' => $data['id']])->count();
          if ($userCount > 0) {
       return view('users.worker_comloging');
	   }else {
			 return redirect()->back()->with('flash_message_error', 'you are not worker ');
	   
	   
	   }}
	   }
	  
	  





	  
	   
	   
	   
	
	
	

   public function login(Request $request){
	    (Auth::attempt($request->only('email','password')));
if($request->isMethod('post')) {
    $data = $request->all() ;
  
  
     if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'] ])) {

//echo"<pre>" ;print_r($data) ; die ;
    return view('users.cart');



        }else {
			 return redirect()->back()->with('flash_message_error', 'invalid user name or password');
			
}
}
   }
   public function workerregistercom(Request $request){

if($request->isMethod('post')) {
    $data = $request->all() ;
    //  echo"<pre>" ;print_r($data) ; die ;
    $userCount = User::where('email', $data['email'])->count();
    if ($userCount > 0) {
        return redirect()->back()->with('flash_message_error', 'email already ');

    } else {
		
        $user = new User; 
        $user->name = $data['name'];
        $user->email = $data['email'];
		    $user->admin = $data['id'];
        $user->password = bcrypt($data['password']);
        $user->save(); 

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
		
         return view('users.login_register');

        }else {
			return redirect()->back()->with('flash_message_error', 'invalid user name or password');
			
}
		    }



}

}

   
   
   
   
   
   
   

   public function register(Request $request){
if($request->isMethod('post')) {
    $data = $request->all() ;
    //  echo"<pre>" ;print_r($data) ; die ;
    $userCount = User::where('email', $data['email'])->count();
    if ($userCount > 0) {
        return redirect()->back()->with('flash_message_error', 'email alr ');

    } else {
		
        $user = new User; 
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save(); 

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
			//Session::put('frontSession',$data['email']);

  
      return view('users.login_register');

        }else {
			return redirect()->back()->with('flash_message_error', 'invalid user name or password');
			
}
		    }



}

}



   
     public function logout(){
		 
Auth::logout();

    Session::forget('frontSession');

    return redirect('/');
    }

    public function contact(){


        return view('users.contact');
    }
	 public function viewusers(){

	 
	$user = User::where(['admin' =>  0 ]  )->get();
	//dd($user);die;
        return view('Admin.view_users', compact('user'));
    }
   

}
