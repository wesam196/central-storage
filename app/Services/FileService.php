<?php

namespace App\Services;
use App\Models\files;
use App\Models\user;
use Illuminate\Support\Facades\Auth;


class FileService{

    public function userAuth($fileId){
   
        $file = Files::find($fileId); 
        if ($file->user_id == auth()->id() ) { 
            return true; 
        }
        return false;

    }



    public function adminAuth(){
   
        if ( Auth::user()->permision == 'admin') { 
            return true; 
        }
       
        return false;

    }


   



}
