<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Services\ParsePlayList;

class PlaylistController extends Controller{
    private $parsePlayList;

    function __construct(){
        $this->parsePlayList = new ParsePlayList();
    }

    public function loadPlayList(Request $request){
        $code = 200;
        $message = "";

        $data = json_decode($request->getContent(), true);

        $resultSave = $this->parsePlayList->parsePlayList($data);

        if($resultSave['totalPlayListSaved'] == 0){
            $code = 500;
            $message = "No playlist could be saved";
        }

        if($resultSave['totalPlayListSaved'] == $resultSave['totalPlayList']){
            $message = "All lists could be saved";
        }
        
        if($resultSave['totalPlayListSaved'] != $resultSave['totalPlayList']){
            $message = "Some list could not be saved";
        }

        return response()->json($message, $code);
    }

    
}