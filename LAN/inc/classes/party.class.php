<?php

class Party extends dbObject {

    function __construct() {
        $this->queries = array(
            'getById' => 'SELECT login FROM people WHERE id = :id',
            'add' => 'INSERT INTO Parties (name, location, starttime, endtime) VALUES (:name, :location, :start, :end)'
//            'updateUser' => 'UPDATE users SET login = :login, first_name = :fname, last_name = :lname WHERE id = :id',
        );
        parent::__construct();
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
        $this->doStatement("add");
    }

    public function update() {
        $this->doStatement("update");
    }
    

}