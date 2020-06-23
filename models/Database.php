<?php

require 'config.php';

class Database{

    public $host = DB_HOST;
    public $user = DB_USER;
    public $password = DB_PASSWORD;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);

        if (!$this->link){
            $this->error = "Connection fail".$this->link->connect_error;
            return false;
        }
    }

    public function select($query){
        $result = mysqli_query($this->link, $query);

        if (mysqli_num_rows($result) > 0){
            return $result;
        }else {
            return false;
        }
    }

    public function insert($query){
        $insert_row = mysqli_query($this->link, $query) or die($this->link->error.__LINE__);

        if ($insert_row){
            return $insert_row;
        }else {
            return false;
        }
    }

    public function update($query){
        $update_row = mysqli_query($this->link, $query) or die($this->link->error.__LINE__);

        if ($update_row){
            return $update_row;
        }else {
            return false;
        }
    }

    public function delete($query){
        $delete_row = mysqli_query($this->link, $query) or die($this->link->error.__LINE__);

        if ($delete_row){
            return $delete_row;
        }else {
            return false;
        }
    }

}