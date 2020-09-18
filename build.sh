#!/bin/bash

echo 'Cloning Web YouTube Downloader...'

rm -rf youtube-downloader

git clone https://github.com/Athlon1600/youtube-downloader

rm -f ./composer.phar

curl -sS https://getcomposer.org/installer | php

cd ./youtube-downloader/

php ../composer.phar install -n

cp ../index.html ./public/
