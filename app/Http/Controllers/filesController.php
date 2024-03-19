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
        /*
        $request->validate([
            'file' => 'required|file|max:2048|mimes:pdf,docx,jpg,jpeg,png,mp4'
        ]);
*/

        


//$request->file('dwf_file')->getMimeType() or getClientMimeType()
        
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
        return response()->json([
            'message' => 'File uploaded successfully',
            'data' => $fileModel,
        ]);       
        
    }
}
