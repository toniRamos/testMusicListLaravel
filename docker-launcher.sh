#!/bin/sh
docker rm -f laravel
docker run --link mysql -ti --name laravel -p 8000:8000 -v /Users/antonio/Desktop/pruebaTecnicaMusicList/testMusicListLaravel:/app laravel ./start.sh