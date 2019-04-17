<?php

namespace App\Services;

use \DB;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\Playlist_song;
use Log;

class ParsePlayList{
    public function parsePlayList($dataParse){
        $countTotalItems = count($dataParse);
        $countSaved = 0;

        foreach ($dataParse as $playListItem){
            DB::beginTransaction();
            try {
                $this->saveItem($playListItem);
            } catch (\Exception $e) {
                DB::rollback();
                Log::Error("The playlist item not save -> ".print_r($playListItem, true));
                throw $e;
            }
            $countSaved += 1;
            DB::commit();
        }

        $resultSave = [
            "totalPlayList" => $countTotalItems,
            "totalPlayListSaved" => $countSaved
        ];

        return $resultSave;

    }

    private function saveItem($item){
        $idPlayList = $this->savePlayList($item);

        if(count($item['songs']) > 0){
            $this->saveListSongs($item['songs'],$idPlayList);
        }

    }

    private function savePlayList($dataPlayList){
        $id = -1;

        if(isset($dataPlayList['title']) && isset($dataPlayList['url']) && isset($dataPlayList['image_url'])){
            $playlistItemSave = new Playlist();

            $playlistItemSave->title = $dataPlayList['title'];
            $playlistItemSave->url = $dataPlayList['url'];
            $playlistItemSave->image_url = $dataPlayList['image_url'];
            $playlistItemSave->save();
    
            $id = $playlistItemSave->id;
        }

        return $id;
    }

    private function saveListSongs($listSongs,$idPlayList){
        foreach($listSongs as $itemSong){
            $idSong = $this->saveSong($itemSong);
            $this->savePlayListSong($idPlayList,$idSong);
        }
    }

    private function saveSong($dataItemSong){
        $dataSong = new Song();

        $dataSong->name = $dataItemSong['name'];
        $dataSong->artist = $dataItemSong['artist'];
        $dataSong->save();

        return $dataSong->id;
    }

    private function savePlayListSong($idPlaylist,$idSong){
        $playlist_song = new Playlist_song();

        $playlist_song->id_playlist = $idPlaylist;
        $playlist_song->id_song = $idSong;
        $playlist_song->save();
    }

}