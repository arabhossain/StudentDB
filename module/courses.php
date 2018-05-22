<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/19/2017
 * Time: 10:27 AM
 */
class courses extends dbController
{
    public function get_course(){
        $result= $this->select('SELECT `cid`, `name`, `cost`,(SELECT locations.name FROM locations WHERE courses.lid=locations.lid) as location, `date`, `userid` FROM `courses`');
        $data = array();

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
              }
        }

        return $data;
    }
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