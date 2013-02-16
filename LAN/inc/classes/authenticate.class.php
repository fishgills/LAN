<?php

class Authenticate {

    public function auth($login, $password) {
        try {
            $user = new User();
            $user->loadForLogin($login, $password);
            session_start();
            $_SESSION['id'] = $user->id;
        } catch (Exception $e) {
            
        }
    }
    public static function prepare() {
        session_start();
        if(!isset($_SESSION['id'])) {
            session_destroy();
        }
    }

    public static function loggedIn() {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

}
