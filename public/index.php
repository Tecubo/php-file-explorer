<?php

require '../vendor/autoload.php';
use App\Auth;

require '../config/routs.php';

$match = $router->match();

Auth::force_connection($match['target']);

ob_start();

if ($match) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
        if (strpos($_SERVER['REQUEST_URI'], 'explorer/') !== false) {
            $arr = explode('/', $_SERVER['REQUEST_URI']);
            $pageTitle = strtoupper($arr[count($arr) - 1]);
        }
    } else {
        require "../views/{$match['target']}";
    }
} else {
    header('Location: /error?e=404');
}

$pageContent = ob_get_clean();
require '../views/layouts/layout.php';