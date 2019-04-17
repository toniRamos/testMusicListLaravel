<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Music List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="{{ URL::asset('css/musicList.css') }}">

    </head>
    <body> 

        <div class="logo">
            <img src='https://musiclist.com/img/logo.svg'/>
        </div>

        <div class="Playlists">
            <?php
            foreach ($playList as $itemList){
                ?>
                    <div class="PlaylistItem">

                <?php
                    ?> </br> <?php

                    ?> Name Playlist -> <a href="<?php echo $itemList['id'] ?>" target='_blank'><?php echo $itemList['title'] ?></a>  <?php
                    
                    ?> </br> <?php

                    ?> Link -> <a href="<?php echo $itemList['url'] ?>" target='_blank'>Listen</a> <?php

                    ?> </br> <?php
                    ?> <img src='<?php echo $itemList['image_url'] ?>'/> <?php

                    ?> </br> <?php
                    ?> </br> <?php
                    ?> </br> <?php
                    
                ?>
                    </div>
                <?php
            }
            ?>
        </div>

    </body>
</html>
