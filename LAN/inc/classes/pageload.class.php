<?php
class PageLoad {
    private $pageRequest;
    
    public function load($page) {
        $className = $page."Page";
        $this->pageRequest = new $className;        
    }
    public function render() {
        $this->pageRequest->render();
    }
}