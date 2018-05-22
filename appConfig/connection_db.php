<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/16/2017
 * Time: 6:47 PM
 */
class connection_db
{
    protected function getConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "studentdb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}