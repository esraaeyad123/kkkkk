<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return view('coming-soon');
//});
// index all Route
Route::get('/contact','FileController@show')->name('upload.file');
Route::post('contact','FileController@store');
//--------------upload file nad store in database
Route::post('/insertfile',array('as'=>'insertfile','uses'=>'UploadController@insertFile'));
Route::get('/','IndexController@index');

//Route::match(['GET','POST'],'/login_register','UsersController@register');
//Route::match(['get', 'post'],'/cart','ProductsController@cart');
Route::group(['middleware'=>['frontlogin']],function() {

    Route::match(['get', 'post'], '/cart','cartController@cart');
});

  //  Route::match(['get', 'post'], '/cart','cartController@cart');

//worker
Route::get('/worker_login','UsersController@workerLoginRegister');
Route::post('/worker-register','UsersController@workerregister');
Route::post('/users/worker_account','UsersController@workerregistercom');
//Route::post('worker_account','UsersController@login');


//Route::match(['get','post'],'account','UsersController@account');

// users
Route::get('/login_register','UsersController@usersLoginRegister');
Route::post('/user-register','UsersController@register') ;
Route::match(['get', 'post'],'/users/de/{id}','cartController@addtocart');
Route::match(['get', 'post'],'/make-booking/{id}','cartController@makebooking');
Route::match(['get', 'post'], '/cart','cartController@cart');
Route::get('/users/delete_cart/{id}','cartController@deleteCart');

	Route::post('/login_account','UsersController@login');
Route::post('/user_account','UsersController@login');
Route::post('/apply-coupon','cartController@applyCoupon');
Route::match(['get','post'],'checkout','cartController@checkout');
Route::get('/user-logout','UsersController@logout');
Route::post('/user_account','UsersController@account');
Route::get('/stripe','cartController@checkout');
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::get('checkout',[

    'uses' => 'cartController@checkout',
    'as' => 'checkout',
    'middleware' =>'auth'
]);

Route::get('/thanks','cartController@thanks');
// profile page
Route::get('/user_account','cartController@userAccount');
	//worker page
Route::match(['get','post'],'/worker_account','cartController@viewOrdersToworker');
Route::match(['get','post'],'/chosedays','EmployeesControllere@ChooseDays');



Route::match(['GET','POST'],'/check-email','UsersController@checkEmail');
Route::match(['get','post'],'/admin','AdminController@login')->name('adminlogin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','AdminController@logout');
Auth::routes();
// listing // show worker // make-booking
Route::get('/Category/{url}','CategoryContrller@services');
Route::get('/worker','cartController@workerPage');




Route::get('intervention-resizeImage',['as'=>'intervention.getresizeimage','uses'=>'FileController@getResizeImage']);

Route::post('intervention-resizeImage',['as'=>'intervention.postresizeimage','uses'=>'FileController@postResizeImage']);
Route::get('/categories/{url}','CategoryContrller@Category') ;

Route::group(['middleware'=>['auth']],function(){
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/Admin/settings','AdminController@settings');
Route::get('/admin/check-pwd','AdminController@chkPassword');
Route::match(['get', 'post'],'/Admin/update-pwd','AdminController@updatePassword') ;

	// serives
Route::match(['get', 'post'],'/Admin/add-servic','CategoryContrller@addSerive');
Route::match(['get', 'post'],'/Admin/edit-servic/{id}','CategoryContrller@editservic');
Route::match(['get', 'post'],'/Admin/delete-servic/{id}','CategoryContrller@deleteservic');
Route::get('/Admin/view-servic','CategoryContrller@viewservic');
// employees
Route::match(['get', 'post'],'/Admin/Employees/add_worker','EmployeesControllere@addEmployees');
Route::match(['get', 'post'],'/Admin/Employees/edit_worker/{id}','EmployeesControllere@editEmployees');
Route::get('/Admin/Employees/view_worker','EmployeesControllere@viewEmployees');
Route::get('/Admin/Employees/delete_worker/{id}','EmployeesControllere@deleteEmployees');
Route::get('/Admin/Employees/delete_worker_image/{id}','EmployeesControllere@deleteEmployeesImage');
Route::get('/Admin/file/view_file/delete_file/{id}','FileController@deleteFile');
Route::get('/Admin/file/view_file','FileController@download');
// coupon
Route::match(['get','post'],'/Admin/coupons/add_coupon','CouponsController@addCoupon');
Route::get('Admin/coupons/view_coupons','CouponsController@viewCoupons');
Route::get('/Admin/delete_coupon/{id}','CouponsController@deleteCoupon');
Route::match(['get','post'],'/Admin/edit_coupon/{id}','CouponsController@editCoupon');

// order 
	Route::get('/Admin/Employees/days','EmployeesControllere@viewdays');
	
	//usrs
	Route::get('/Admin/view_users','UsersController@viewusers');
	//order
	Route::get('/Admin/order/view-orders','cartController@viewOrders');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
