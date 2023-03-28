<?php

function site_url(){
    /*
    $site_url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    echo $site_url;
    */
     if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function current_url(){
    $current_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    echo $current_url;
}
