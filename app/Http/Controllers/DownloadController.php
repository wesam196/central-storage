<?php

namespace App\Http\Controllers;
use App\Models\files;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    
   
public function download($id)
{ 

          // Retrieve the file from the database
          $file = Files::findOrFail($id);

          // Define the file's MIME type
          $mime = mime_content_type(storage_path('app/' . $file->path));
  
          // Prepare the file for download
          return response()->download(storage_path('app/' . $file->path), $file->filename, ['Content-Type' => $mime]);
      

}
}
