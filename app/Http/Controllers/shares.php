<?php

namespace App\Http\Controllers;
use App\Models\share;
use App\Models\files;
use App\Models\user;
use App\Services\FileService;
use Illuminate\Http\Request;

class shares extends Controller{




public function toOther(){

    $data = Share::where('creator_id', '=', auth()->id())->paginate(10);

    $fulldata=[];
    foreach ($data as $item) {
        $files = files::FindOrFail($item->file_id);
        $name = user::FindOrFail($item->user_id); 

        $fulldata[] = [
            'file_id' => $item->file_id,
            'filename' => $files->filename,
            'shared_to' => $name->name
        ];
    }

    return view('sharedToOther', ['fulldata' => $fulldata , 'shares'=>$data]);


}

public function toME(){
    $data = Share::where('user_id', '=', auth()->id())->paginate(10);

    $fulldata=[];
    foreach ($data as $item) {
        $files = files::FindOrFail($item->file_id);
        $name = user::FindOrFail($item->user_id); 

        $fulldata[] = [
            'file_id' => $item->file_id,
            'filename' => $files->filename,
            'shared_to' => $name->name
        ];
    }

    return view('sharedToME', ['fulldata' => $fulldata , 'shares'=>$data]);




}


}

