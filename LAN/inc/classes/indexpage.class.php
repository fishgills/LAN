<?php

class IndexPage extends Page {

    public function render() {
        if (Authenticate::loggedIn()) {
            $this->renderAuthed();
        } else {
            $this->renderUnAuthed();
        }
    }

    public function renderAuthed() {
        ?>
        User is authed!
        <?php
    }

    public function renderUnAuthed() {
        ?>
        User is unauthed!
        <?php
    }

    public function _handlePost() {
        
    }

}