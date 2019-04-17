<?php

namespace App\Services;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\Playlist_song;
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

    public function recoverPlayListId($id){
        $dataReturn = [];

        $playList = Playlist::where('id',$id)->first();

        $pibotTable = Playlist_song::where('id_playlist','=',$id)->get();

        $idSongs = [];
        $songsPlayLists = [];

        foreach($pibotTable as $itemPibot){
            $idSongs[] = $itemPibot->id_song;
        }

        foreach($idSongs as $idSongFind){
            $songFound = Song::where('id','=',$idSongFind)->first();
            $songsPlayLists[$songFound->id] = [
                "artist" => $songFound->artist,
                "name" => $songFound->name,
                "id" => $songFound->id
            ];
        }

        $dataReturn =[
            "title" => $playList->title,
            "url" => $playList->url,
            "image_url" => $playList->image_url,
            "songs" => $songsPlayLists
        ];

        return $dataReturn;
    }

}