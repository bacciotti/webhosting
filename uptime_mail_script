<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/01/2020
 * Time: 11:20
 */

// No http://
$arrUrl = array(
    "url-1.com",
    "url-2.com",
    "url-3.com"
);

foreach ($arrUrl as $url){
    if (checkStatus($url) == false) {
        echo returnStatusMsg($url, "OFFLINE\n");
        setLog($url, "OFFLINE");
        sendMail($url);
    } 
}

function checkStatus($url) {
    if($socket =@ fsockopen($url, 80, $errno, $errstr, 15)) {
        return true;
    } else { 
        return false;
    }
    fclose($socket);
}

function sendMail($url) {
    $text = returnStatusMsg($url, "OFFLINE");
    mail("any@mail.com", $text, $text);
}

function setLog($url, $msg){
    $file = "log.txt";
    $text = returnStatusMsg($url, $msg);
    $fp = fopen($file, "a+");
    fwrite($fp, $text);
    fclose($fp);
}

function returnStatusMsg($url, $msg){
    date_default_timezone_set("America/Sao_Paulo");
    $date = date("d/m/Y H:i:s");
    return $date.": ".$url." ".$msg."\n";
}

?>
