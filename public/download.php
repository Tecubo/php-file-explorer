<?php

require '../vendor/autoload.php';
use App\Auth;

Auth::force_connection('download.php');

if (isset($_GET['file'])) {
    $filename = basename($_GET['file']);
    $path = dirname(__DIR__) . '/explorer/' . $_GET['file'];

    if (file_exists($path)) {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Emcoding: binary");
    
        readfile($path);
        exit;
    } else {
        header('Location: /error?e=filenotfound');
        exit();
    }

}