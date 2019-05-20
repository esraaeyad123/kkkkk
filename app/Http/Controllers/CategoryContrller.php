<?php

namespace App\Http\Controllers;
use Auth;
use Response;
use Session;



use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Coupon;
use DB;
use App\Employe;
class CategoryContrller extends Controller
{
    public function addSerive(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            /* if(empty($data['status'])){
                 $status='0';
             }else{
                 $status='1';
             } */
            $data = $request->all();
            $Serive = new Category;
            $Serive->name = $data['category_name'];
            $Serive->description = $data['description'];

            $Serive->save();
            return redirect('Admin/add-servic')->with('flash_message_success', 'Serive has been added successfully');
        }
        return view('Admin.services.add-servic');

        //->with(compact('levels'));
    }


    public function editservic(Request $request, $id = null)
    {


        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die ;

            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }

            Category::where(['id' => $id])->update(['status' => $status, 'name' => $data['category_name'], 'description' => $data['description'], 'url' => $data['url']]);
            return redirect()->back()->with('flash_message_success', 'Serive has been updated successfully');
        }

        $categoryDetails = Category::where(['id' => $id])->first();

        return view('Admin.services.edit-servic')->with(compact('categoryDetails'));
    }


    public function viewservic()
    {

        $categories = category::get();

        return view('Admin.services.view-servic')->with(compact('categories'));
    }

    public function deleteservic($id = null)
    {
        Category::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', 'Category has been deleted successfully');

    }

    public function services($url = null)
    {

        /*  $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
                     if($categoryCount==0){
                         abort(404);
                     } */

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();


        $categoryDetails = Category::where(['url' => $url])->first();
        $productsAll = Employe::where(['categories_id' => $categoryDetails->id])->get();


        return view('Category.listing')->with(compact('categories', 'productsAll', 'categoryDetails'));
    }

    public function showWorker(Request $request, $id)
    {

        /* $catid =[];
        $cats=	Category::where($id='id')->find($id);

        foreach($cats   as $val ){
        array_push($catid ,$val->id) ;
            }

            dd($cats );
        $workerDeatails = Employe::whereIn('categories_id',$catid)->get() ; */

        $deatails = Employe::where('categories_id', $id)->get();


        return view('Category.detail')->with(compact('deatails'));
    }

}
