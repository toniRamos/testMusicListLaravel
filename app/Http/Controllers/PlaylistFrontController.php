<?php

namespace App\Http\Controllers;


class PlaylistFrontController extends Controller{
    public function listPlaylist(){
        $name = "antonio";
        return \View::make("playlists")->with("name", $name);
    }
}