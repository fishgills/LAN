<?php
abstract class Page {
    private $data = Array();
    
    abstract public function render();
    abstract public function _handlePost();
    
    public function handlePost() {
        $this->processPost();
        $this->_handlePost();
    }
    private function processPost() {
        foreach($_POST as $key => $value) {
            $this->data[$key] = $value;
        }
    }
}