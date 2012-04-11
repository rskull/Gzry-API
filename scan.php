<?php
    
    //cronで回して監視
    define('PATH', 'urls/');
    $timer = 60 * 60 * 24;
    $dir = scandir(PATH);
    foreach ($dir as $file) {
        if (preg_match('/(\.dat)$/', PATH.$file)) {
            $mt = filemtime(PATH.$file);
            if ((time() - $mt) > $timer) {
                unlink(PATH.$file);
            }
        }
    }
