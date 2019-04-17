<?php

namespace App\Http\Controllers;

use \DB;
use Log;

class EndpointController extends Controller{

    function __construct(){
        
    }

    public function ping(){
        return response()->json("pong", 200);
    }

    public function pingDatabase(){
        $codeReturn = 200;

        // Test database connection
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            $codeReturn = 400;
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }

        return response()->json("pongDatabase", $codeReturn);
    }

    
}