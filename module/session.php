<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/19/2017
 * Time: 12:38 PM
 */
class session extends dbController
{
    public function get_sessions(){
        $result= $this->select('SELECT * FROM `session`');
        $data = array();

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $data[$row['sid']] = $row['name'];

            }
        }

        return $data;
    }
}