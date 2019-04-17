<?php

namespace App\Services;

use App\Models\Playlist;
use \DB;

class ViewPlayListService{
    public function recoverPlayList(){
        $dataReturn = [];

        $allPlaylist = Playlist::All();

        foreach($allPlaylist as $itemPlayList){
            $dataReturn[$itemPlayList->id] = [
                'id' => $itemPlayList->id,
                'title' => $itemPlayList->title,
                'url' => $itemPlayList->url,
                'image_url' => $itemPlayList->image_url
            ];
        }

        return $dataReturn;
    }
}