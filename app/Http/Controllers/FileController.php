<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

use Illuminate\Http\Request;
use DB ;
use App\File;
class FileController extends Controller
{
    public function show()
    {

return view('users.contact');
    }

       public function store(Request $request)
       {
           $data = $request->all();
           if ($request->hasFile('file')) {
               $filename = $request->file->getClientOriginalName();
               $filesize = $request->file->getClientSize();
               $request->file->storeAs('public/upload', $filename);
               $file = new File();
               $file->name = $filename;
               $file->_size_ = $filesize;
               $file->inf = $data['inf'];
               $file->fullname = $data['fullname'];
               //$file->category = $data['cate'];
               $file->email = $data['email'];
               $file->mobile = $data['mobile'];
                $file->save();
               return redirect()->back()->with('flash_message_success', 'success sinding CV ');
           } else {
               return redirect()->back()->with('flash_message_warning', ' CV should be in PDF or Word ');
           }


       }  public function download()
    {    $downloads=DB::table('files')->get();
      return view('Admin.file.view_file',compact('downloads'));

    }public function deleteFile($id=null){
             $file=File::where(['id'=>$id])->delete();
         return  redirect()->back()->with('flash_message_success','Delete is success');

        }
}
