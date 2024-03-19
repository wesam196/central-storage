<?php

namespace App\Http\Controllers;
use App\Models\files;
use App\Models\share;
use App\Models\user;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class homeController extends Controller
{

    public function index(){
        $data =  files::where('user_id', 'like', auth()->id())->get();
        $users = user::all();
   return view('home' , ['data' => $data , 
                        'users' =>$users
]);

}

public function share(Request $request){
      
        
      if ($request->has('assigned')){

        $j=request('user_id');

        $results = \DB::table('users')
        ->whereIn('name', $j)
        ->select('id')
        ->get();



        if ($results->isNotEmpty()) {
            $firstResult = $results->first(); // Get the first element of the collection
            
            $getfiles=$request->input('assigned');
            foreach($getfiles as $file){

            $data = new share();
            $data->creator_id = auth()->id();
            $data->user_id = $firstResult->id; // Access the 'id' property of the first result
            
            
            $data->file_id = $file;
            
            $data->save();

        }
        }


        return redirect('/shareToOther')->with('msg', 'files shared successfully');

    }
    
    elseif($request->has('download')==true){
        session(['field1' => $request->input('download[]')]);
       // session(['field2' => $field2]);
        return redirect()->route("download.file");
    }
   
}




}