<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/16/2017
 * Time: 6:50 PM
 */
require('connection_db.php');
class dbController extends connection_db
{
    public function insert($sql){
        $result=$this->getConnection()->query($sql);
        var_dump($sql);
        $this->getConnection()->close();
        return $result;
    }
    public function update($sql){
        $result=$this->getConnection()->query($sql);
        $this->getConnection()->close();
        return $result;
    }
    public function delete($sql){
        $result=$this->getConnection()->query($sql);
        $this->getConnection()->close();
        return $result;
    }
    public function select($sql){
        $result=$this->getConnection()->query($sql);
        $this->getConnection()->close();
        return $result;
    }
}