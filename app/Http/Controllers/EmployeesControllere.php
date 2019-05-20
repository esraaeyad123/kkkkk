<?php



namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\Respons ;
use App\ProductsImage;
use App\Category ;
use App\employe ;
use App\days ;
use Session ;
use Image;
use Auth;
use map;
use DB;

class EmployeesControllere extends Controller
{
        public function addEmployees(Request $request){
		
		 $categories=Category::pluck('name','id');
		 $request->merge([
          'days' => implode(',', (array) $request->get('days'))
    ]);
	$days = implode(",",array_keys($request->except(['_method','_token'])));
        $days=json_decode(auth()->user()->days,true);
			$categories=Category::pluck('name','id');
		if($request->isMethod('post')){
			$data=$request->all();
	        $categories=Category::pluck('name','id');
		    if(empty($data['categories_id'])){
                return redirect()->back()->with('flash_message_error','serives is missing');
		    };
	        $employe = new Employe;
			$employe->categories_id	= $data['categories_id'];
			$employe->firstname = $data['firstname'];
	//	 $employe->category_name = $data['key'];

			$employe->lastname = $data['lastname'];
			$employe->Email = $data['Email'];
			$employe->mobile = $data['mobile'];
			// $employe->Date = $data['Date'];
			            $employe->days= $data['days'];

		    $employe->price = $data['price'];
			// Upload Image
            if($request->hasFile('picture')){
            	$image_tmp = Input::file('picture');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small/'.$fileName;  

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
					$employe->picture = $fileName; 
				}
            }
			$employe->address= $data['address'];
            $employe->days= $data['days'];
 			 $employe->save();
            return redirect()->back()->with('flash_message_success','worker has been added');
	    }
	    return view('Admin.Employees.add_worker', compact('categories'));
	}
	    public function editEmployees (Request $request ,$id=null){
		if($request->isMethod('post')){
						$data = $request->all();
          $employeDetails= new Employe;
         $employeDetails = DB::table('employees')->get();
         $employeDetails  = json_decode(json_encode( $employeDetails ));
         $employeDetails = new employe;
        json_decode(  $employeDetails, true);
        $employeDetails = json_decode($request, true);
        $employeDetails= collect(DB::table('employees','categories')->get(['days','id','firstname','lastname','picture','mobile','address','categories_id']));
            $employeDetails = Employe::get();
            $employeDetails = json_decode(json_encode( $employeDetails,true));
             $categories=Category::pluck('name','id');
                foreach(  $employeDetails as $key => $val){
            $categories = Category::where(['id' => $val->categories_id])->first();
                    if(!empty($categories->name))
              $employeDetails[$key]->category_name = $categories->name;}
                  $employeDetails = json_decode(json_encode(  $employeDetails));
                    if($request->hasFile('picture')){
                        $image_tmp = Input::file('picture');
                        if ($image_tmp->isValid()) {
                            // Upload Images after Resize
                            $extension = $image_tmp->getClientOriginalExtension();
                            $fileName = rand(111,99999).'.'.$extension;
                            $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                            $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;
                            $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;

                            Image::make($image_tmp)->save($large_image_path);
                            Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                            Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                        }
                    }else if(!empty($data['current_image'])){
                        $fileName = $data['current_image'];
                    }else{
                        $fileName = '';
                    }

		Employe::where(['id'=>$id])->update(['categories_id'=>$data['categories_id'],'firstname'=>
		$data['firstname'],
				'email'=>$data['email'],'mobile'=>$data['mobile'],'days'=>$data['days'],'address'=>$data['address'],'price'=>$data['price'],'picture'=>$fileName ]);
				return redirect()->back()->with('flash_message_success','Worker has been update');
		}
	  $employeDetails= Employe::where(['id'=>$id])->first();
		   $categories=Category::pluck('name','id');
         return view('Admin.Employees.edit_worker',compact('employeDetails','categories'));
}
        public function viewEmployees (Request $request){
	$employe = Employe::get();
	$employe = Employe::all();
    //$employe = DB::table('employees')->get();
        $employe  = json_decode(json_encode($employe));
         $employe = new Employe;
        json_decode($employe, true);
        $employe = json_decode($request, true);
        $employe= collect(DB::table('employees','categories')->get(['days','id','firstname','lastname','picture','mobile','address','categories_id']));
         $employe = Employe::get();
         $employe = json_decode(json_encode($employe,true));
         $categories=Category::pluck('name','id');
        foreach($employe as $key => $val){
        $categories = Category::where(['id' => $val->categories_id])->first();
            if(!empty($categories->name))
            $employe[$key]->category_name = $categories->name;}
         $employe = json_decode(json_encode($employe));
        //	"<pre>"; print_r($employe); die;
                return view('Admin.Employees.view_worker')->with(compact('employe'));
            }
        public function deleteEmployeesImage($id=null){
            $employeDetails=Employe::where(['id'=>$id])->update(['picture'=>'']);

        return redirect()->back()->with('flash_message_success','image has been delete');

          }
        public function deleteEmployees($id=null){
            $employeDetails=Employe::where(['id'=>$id])->delete();
         return  redirect()->back()->with('flash_message_success','Worker has been delete');

        }

    public function service($id=null){


        return view('services.detail')->with( compact('employeDetails'  ));


    }
	public function ChooseDays(Request $request){
		if($request->isMethod('post')){
						$data = $request->all();
		$worker_id = Auth::user()->admin;
		$name = Auth::user()->name;
		
						
		 $employe = new days;
	   $employe->days= $data['days'];
	$employe->message= $data['message'];
	$employe->deposit= $data['deposit'];
		$employe->worker_name=$name;
			$employe->worker_id= $worker_id;
	  $employe->save();
	

        return redirect()->back()->with('flash_message_success',' has been send t admin soon update');
		}
        return view('users.chosedays');


    }
	
	 public function viewdays(){
            $employe = days::get();
 return view('Admin.Employees.days', compact('employe'));
        }
	
}
