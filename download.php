<?php

    $file = 'https://r6---sn-un57en7s.googlevideo.com/videoplayback?expire=1600508793&ei=GX9lX66pFIbpogPZ2pXIBA&ip=128.199.97.204&id=o-APL1Mu-gpLCNO9ud4ofTSsc9NVy_iVWqsQbNcitllVLK&itag=18&source=youtube&requiressl=yes&pcm2=no&vprv=1&mime=video%2Fmp4&gir=yes&clen=67184212&ratebypass=yes&dur=922.412&lmt=1599784761362685&fvip=5&fexp=23915655&c=WEB&txp=5431432&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cpcm2%2Cvprv%2Cmime%2Cgir%2Cclen%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRgIhAMB7iQIGZHK77RLSiHCEJNNpzhC1PUcp7Z4rDOyZoVUsAiEA98aa8l1GdwjvhRZH0GhJp2yaTJXFb4qTikmWKORobjU%3D&rm=sn-npols7d&req_id=4ed93852ce0ea3ee&ipbypass=yes&redirect_counter=2&cm2rm=sn-ipoxu-u2xd7d&cms_redirect=yes&mh=6V&mip=61.231.52.178&mm=29&mn=sn-un57en7s&ms=rdu&mt=1600487070&mv=m&mvi=6&pl=22&lsparams=ipbypass,mh,mip,mm,mn,ms,mv,mvi,pl&lsig=AG3C_xAwRAIgAqy5sPOfNm0cL2MFxkxDLOmP4gUwXik8nF3w54mMZf4CIAJ_AIfcvS-a76X8y2AoHoXtWPWloUnv-OqlimfbJ91H';

    if ($file === null) {
        die('Cannot find the video_url URL parameter');
    }

    $headers = array_change_key_case(get_headers($file, true));

    $fileSize = (array)$headers['content-length'];

    if (count($fileSize) === 0) {
        die('Cannot fetch the file size');
    }

    if (strpos('404 Not Found', $headers[0]) === false) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=videoplayback.mp4');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . $fileSize[count($fileSize)-1]);
        echo "downloading";
        ob_clean();
        flush();
        readfile($file);
        exit;
    } else {
        die($file . " is not found...\n");
    }

    while(true) {
        echo "\n";
        if (connection_status() != 0) {
            die;
        }
    }
