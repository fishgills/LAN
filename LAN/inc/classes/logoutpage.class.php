<?php

class LogoutPage extends Page {

    public function preHook() {
        session_destroy();
        Template::redirect("/");
        
    }
    public function render() {
    }

    public function _handlePost() {
    }

}
