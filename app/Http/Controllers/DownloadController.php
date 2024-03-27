<?php

namespace App\Http\Controllers;
use App\Models\files;
use App\Services\FileService;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    
   
public function download($id)
{ 


        $athunticate = (new FileService);
        if( $athunticate->userAuth($id) || $athunticate->adminAuth()    ){
          $file = Files::findOrFail($id);
          $mime = mime_content_type(storage_path('app/' . $file->path));
          return response()->download(storage_path('app/' . $file->path), $file->filename, ['Content-Type' => $mime]);
        }
        else{
            abort(404);
        }

}
}
