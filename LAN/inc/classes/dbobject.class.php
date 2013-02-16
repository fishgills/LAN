<?php

class dbObject {

    public $queries = array();
    public $data = array();

    public function __construct() {
        
    }

    public function getPreparedStatement($key) {
        global $dbh;

        return $dbh->prepare($this->queries[$key]);
    }

    public function directQuery($sql) {
        global $dbh;
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
    }

    public function doStatement($stmt, $return = false) {
        $stmt = $this->getPreparedStatement($stmt);
        $stmt->setFetchMode(PDO::FETCH_INTO, $this);
        $this->bindValues($stmt);
        $stmt->execute();
        if ($return) {
            return $stmt;
        }
    }

    public function bindValues($stmt, $skip = false) {
        foreach ($this->data as $key => $value) {
            $stmt->bindValue(":" . $key, $value);
        }
    }

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'], E_USER_NOTICE);
        return null;
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function loadById($id) {
        $stmt = $this->getPreparedStatement('getById');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_INTO, $this);
        return $stmt->fetch();
    }

    public function save() {
        if (!isset($this->id)) {
            $this->add();
        } else {
            $this->update();
        }
    }

    public function add() {
        $stmt = $this->getPreparedStatement('addUser');
        $stmt->execute();
    }

    public function update() {
        $stmt = $this->getPreparedStatement('updateUser');
        $stmt->execute();
    }

}