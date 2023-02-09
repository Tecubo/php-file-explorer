<?php

namespace App;

class Auth {

    public static function force_connection ($target) : void 
    {
        session_start();
        if (!self::is_connected() && $target != 'login.php') {
            header('Location: /login?force=1');
            exit();
        }
    }

    public static function is_connected () : bool
    {
        self::first_connection();
        return $_SESSION['connected'];
    }

    public static function first_connection () : void
    {
        if (!isset($_SESSION['connected'])) {
            $_SESSION['connected'] = false;
            header('Location: /login');
            exit();
        }
    }

}