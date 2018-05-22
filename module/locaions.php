<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/16/2017
 * Time: 8:20 PM
 */

class locaions extends dbController
{
    public function get_locaions(){
       $result= $this->select('SELECT * FROM `locations`');
        $data = array();

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $data[$row['lid']] = $row['name'];

            }
        }

       return $data;
    }
}