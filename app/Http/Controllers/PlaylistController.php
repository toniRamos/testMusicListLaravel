<?php

namespace App\Http\Controllers;

use \DB;
use Log;
use Illuminate\Http\Request;

class PlaylistController extends Controller{

    function __construct(){
        
    }

    public function loadPlayList(Request $request){
        $data = json_decode($request->getContent(), true);

        print_r($data);die;

        return "pong";
    }

    
}