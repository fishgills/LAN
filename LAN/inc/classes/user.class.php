<?php

class User extends dbObject {

    function __construct() {
        $this->queries = array(
            'login' => "select id from users where email = :email and password = :password",
            'getById' => 'SELECT email FROM users WHERE id = :id',
            'addUser' => 'INSERT INTO people (login, password) VALUES (:login, :password)',
            'updateUser' => 'UPDATE users SET login = :login, first_name = :fname, last_name = :lname WHERE id = :id',
        );
        parent::__construct();
    }
    
    public function loadForLogin($login, $password) {
        $this->$login = $login;
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
        if ($this->id === NULL) {
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