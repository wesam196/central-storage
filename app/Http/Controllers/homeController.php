<?php

namespace App\Http\Controllers;
use App\Models\files;
use App\Models\share;
use App\Models\user;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Services\FileService;


class homeController extends Controller
{

    public function index(){   
        $athunticate = (new FileService);
        $data =  files::all();
        $users = User::where('id', '!=', auth()->id())->get();
        $Files = [];
        foreach($data as $data){
            if($athunticate->userAuth($data->id)){
                $Files[]=$data;
            }
        }
       
   return view('home' , ['data' => $Files , 
                        'users' =>$users
]);

}

public function share(Request $request){    
        
    $user_id =$request->get('user_id');
    $user = User::findOrFail($user_id)->first();
    $getfiles = $request->input('assigned');
    
    $shares = Share::where('user_id', '=', $user->id)
    ->whereIn('file_id', $getfiles)
    ->get();


        foreach ($getfiles as $file) {
            $unsahred[]=$file;
            $shares = Share::where('user_id', '=', $user->id)
            ->where('file_id','=', $file)->get();
            
            if ($shares->isEmpty()){                   
                    $data = new share();
                    $data->creator_id = auth()->id();
                    $data->user_id = $user->id;
                    $data->file_id = $file;
                    $data->save();
                           
                }             
            
            }
    
            return redirect()->back()->with('msg', 'the transaction done check from "share to other" page'); 

    }
    
    
   





}