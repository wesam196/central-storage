<?php

namespace App\Http\Controllers;
use App\Models\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class filesController extends Controller
{
    public function index(){
        return view('upload-file');
    }

    
    public function store(Request $request)
    {
         
        $files = $request->file('file');//->getMimeType();
        foreach ($files as $file) {

        $filename =  $file->getClientOriginalName();
        $path = Storage::disk('local')->put( auth()->id(),$file);

        $fileModel = Files::create([
            'filename' => $filename,
            'original_filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'path' => $path,
          
        ]);
    }
        return redirect()->back()->with('msg', 'File/Files uploaded successfully');      
        
    }



    public function edit($id){

        return view ("edit");
        upload_edit($id);
        return view("home");
    }

    public function upolad_edit( $id){
        $data = files::FindOrFail($id);

        $file = $request->file('file');

      
        $path = Storage::disk('local')->put( auth()->id(),$file);

        
        
        $data->size= $file->getSize();
        $data->path=  $path;
        $data->save();
          
       
    
        return view("home");
    }


}
