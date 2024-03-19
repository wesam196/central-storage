<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    
    /*
    public function download(Request $request)
    {
        

      //  if (!Storage::exists($path)) {
        //    abort(404);
        //}/



       
            $j=session('field1');
    
            $file_path = \DB::table('files')
            ->whereIn('id', $j)
            ->select('path')
            ->get();
    
            $creator_id = \DB::table('files')
            ->whereIn('id', $j)
            ->select('user_id')
            ->get();
    
            //if ($results->isNotEmpty()) {
              //  $firstResult = $results->first(); // Get the first element of the collection
                
                //$getfiles=$request->input('download');
                foreach($j as $file){
                    $creator_id=$creator_id->last();
                    $path = storage_path("/app/{{$creator_id}}/{{ $file_path}}");
                   
                 return response()->download($path);
                 /*
                $data = new share();
                $data->creator_id = auth()->id();
                $data->user_id = $firstResult->id; // Access the 'id' property of the first result
                
                
                $data->file_id = $file;
                
                $data->save();
                    
            }
            }
    
    
           // return redirect('/shareToOther')->with('msg', 'files shared successfully');
    
        }



        
   // }

//return redirect('/')->with('access', 'access to contrlooer');

*/
public function download(Request $request)
{
    $j = session('field1');

    $filePaths = \DB::table('files')
        ->whereIn('id', $j)
        ->pluck('path'); // Use pluck to get an array of paths directly

    $creatorId =1;// \DB::table('files')
        //->whereIn('id', $j)
        //->pluck('user_id')
        //->last(); // Get the last user_id from the collection

    foreach ($filePaths as $filePath) {
        $path = storage_path('app\\'   . $filePath);

       // if (file_exists($path)) {
            return response()->download($path);
        //} else {
          //  abort(404); // File not found
        //}
    }

    // If the loop completes without returning a response, file not found
   // abort(404); // File not found
}
}
