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

            <div class="PlaylistItem">
                Title list -> <?php echo $detailPlayList['title'] ?>
                </br> 
                Url -> <a href="<?php echo $detailPlayList['url'] ?>" target='_blank'>Listen</a>
                </br> 
                
                <img src='<?php echo $detailPlayList['image_url'] ?>' />
                </br> 
            </div>

            <hr>

            <?php
            if(isset($detailPlayList['songs'])){
                $count = 1;
                foreach ($detailPlayList['songs'] as $itemSong){
                    ?>
                        <div class="PlaylistItem">

                        <?php
                            ?> </br> <?php
                            ?> Song number -> <?php echo $count; ?> <?php
                            
                            ?> </br> <?php

                            ?> Name -> <?php echo $itemSong['name']; ?> <?php

                            ?> </br> <?php

                            ?> Artist -> <?php echo $itemSong['artist']; ?> <?php

                            ?> </br> <?php
                            
                        ?>
                        </div>
                    <?php
                    $count += 1;
                }
            }else{
                ?>
                    This playlist no contain songs.
                <?php
            }
            ?>
        </div>

    </body>
</html>
