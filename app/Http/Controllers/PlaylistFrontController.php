<?php

namespace App\Http\Controllers;

use App\Services\ViewPlayListService;

class PlaylistFrontController extends Controller{
    public function listPlaylist(){
        $servicePlayList = new ViewPlayListService();
        
        $playlist = $servicePlayList->recoverPlayList();

        return \View::make("playlists")->with("playList", $playlist);
    }

    public function detailPlaylist($idPlayList){
        $servicePlayList = new ViewPlayListService();
        
        $detailPlayList = $servicePlayList->recoverPlayListId($idPlayList);

        return \View::make("detailplaylist")->with("detailPlayList", $detailPlayList);
    }

}