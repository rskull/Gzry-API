<?php

    $url = $_GET['url'];
    define('URL_PATH', 'urls/');

    //ランダムな文字列
    function randstr ($len) {
        $list = 'abcdifghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $ls = str_split($list);
        for ($i=0;$i<$len;$i++) {
            $token .= $ls[mt_rand(0, count($list)-1)];
        }
        return $token;
    }
    
    //短縮URL生成
    if (!empty($url)) {
        $ptn = '/^https?:\/\/([\w\/\.]+)(.*)/';
        if (preg_match($ptn, $url, $str)) {
            $rand = randstr(7);
            $file = fopen(URL_PATH.$rand.'.dat', 'ab');
            flock($file, LOCK_EX);
            fwrite($file, urlencode($str[0]));
            fclose($file);
            echo 'http://gzry.tk/'.$rand;
        }
    }
    else {
        echo 'Error';   
    }
