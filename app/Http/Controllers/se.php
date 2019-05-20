<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servic;


class se extends Controller
{
    public function addSerive(Request $request){
	if($request->isMethod('post')){
		$data=$request->all();
		$Serive = new Serive ;
		$Serive -> name = $data['serive_name'];
        $Serive -> description = $data['serive_description'];
        $Serive -> url = $data['url'];  
        $Serive -> save();		
	}		
		
	
		return view('Admin.services.add-servic');
	}
	
	public function editSerive(Request $request ,$id=null){
		$categoryDetails =Servic :: where(['id'=>$id])->first();
		return view('Admin.services.edit-servic');
		
	}
	public function viewSerives(){  
        
        return view('Admin.services.view-servic') ;
    }
	
	
}
