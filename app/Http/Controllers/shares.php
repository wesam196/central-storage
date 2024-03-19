<?php

namespace App\Http\Controllers;
use App\Models\share;
use App\Models\files;

use Illuminate\Http\Request;

class shares extends Controller
{


public function toOther()
{
    $data = share::all();
    $file = files::all();
    $fileNamesList = [];
    $fileNamesName=[];
    $fileNames=[];
    foreach ($data as $fileIds) {
        if($fileIds->creator_id ==  auth()->id()){
        $results = \DB::table('files')
            ->where('id',  $fileIds->file_id)
            ->select('filename')
            ->get();

            $name = \DB::table('users')
            ->where('id',  $fileIds->user_id)
            ->select('name')
            ->get();
                    
        //foreach ($results as $result) {
            $fileNamesList[] = $results->last()->filename;
            $fileNamesName[] = $name->last()->name;
            $fileNames['fileNamesList']=$fileNamesList;
            $fileNames['fileNamesName']=$fileNamesName;
    }
    }
   




    return view('sharedToOther', ['data' => $data, 'fileNames' => $fileNames ]);
}


public function toME()
{
    $data = share::all();
    $file = files::all();
    $fileNamesList = [];
    $fileNamesName=[];
    $fileNames=[];
    foreach ($data as $fileIds) {
        if($fileIds->user_id ==  auth()->id()){
        $results = \DB::table('files')
            ->where('id',  $fileIds->file_id)
            ->select('filename')
            ->get();

            $name = \DB::table('users')
            ->where('id',  $fileIds->creator_id)
            ->select('name')
            ->get();
                    
        //foreach ($results as $result) {
            $fileNamesList[] = $results->last()->filename;
            $fileNamesName[] = $name->last()->name;
            $fileNames['fileNamesList']=$fileNamesList;
            $fileNames['fileNamesName']=$fileNamesName;
    }
    }
   




    return view('sharedToME', ['data' => $data, 'fileNames' => $fileNames ]);
}





}

