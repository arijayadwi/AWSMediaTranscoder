<?php

session_start();

$Nama = $_SESSION["name"];
$dir = $_SESSION["targetdir"];
$target = $_SESSION["targetfile"];
$bitrate = $_SESSION["bit_rate"];
$format = $_SESSION["format_value"];
$output = "download/";

$file =  $output.$Nama.".".$format;
echo $file;

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: video/mpeg');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean(); 
    flush(); 
    readfile($file);
    exit;
}
?>