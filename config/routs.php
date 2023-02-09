<?php

$router = new AltoRouter();

// pages routs
$router->map('GET', '/', 'home.php', 'home');
$router->map('GET', '/login', 'login.php', 'login');
$router->map('POST', '/login', 'login.php', 'login_post');
$router->map('GET', '/error', 'layouts/error.php', 'error');

// file explorer routs
$router->map('GET', '/explorer', function () {
    require '../views/layouts/explorer.php';
}, 'explorer');

$router->map('GET', '/explorer/[*]', function () {
    require '../views/layouts/explorer.php';
});
