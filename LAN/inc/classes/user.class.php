<?php

class User extends dbObject {

    function __construct() {
        $this->queries = array(
            'login' => "select id from people where login = :login and password = sha1(:password)",
            'getById' => 'SELECT login FROM people WHERE id = :id',
            'addUser' => 'INSERT INTO people (login, password) VALUES (:login, SHA1(:password))'
//            'updateUser' => 'UPDATE users SET login = :login, first_name = :fname, last_name = :lname WHERE id = :id',
        );
        parent::__construct();
    }
    
    public function loadForLogin($login, $password) {
        $this->login = $login;
        $this->password = $password;
        $stmt = $this->doStatement("login", true);
        if(!$result = $stmt->fetch()) {
            throw new Exception("Invalid login and password.");
        }
        return $result;
    }
    public function loadById($id) {
        $this->id = $id;
        return $this->doStatement("getById", true);
    }

    public function save() {
        if (!isset($this->id)) {
            $this->add();
        } else {
            $this->update();
        }
    }

    public function add() {        
        $this->doStatement("addUser");
    }

    public function update() {
        $this->doStatement("updateUser");
    }
    

}