<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/19/2017
 * Time: 1:51 PM
 */
class new_students extends dbController
{
    public function get_new_students (){
        $result= $this->select('SELECT `studentit`, `name`, `course`, `Locaion`, (`payable`-(payable*discount)/100) as payable, `email`, `mobile`, `source`, `slevel`, `discount`, `paid`, `admission`, `followup`, `user` FROM `new_students`  WHERE slevel=1 AND followup=1');
        $data = array();

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function get_new_students_for_promotion (){
        $result= $this->select('SELECT `studentit`, (SELECT session.name FROM session WHERE session.sid=new_students.sid) as `session`, `name`,locaion, `course`, `email`, `mobile`  FROM `new_students` WHERE slevel=1 AND followup=1');
        $data = array();

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function get_new_students_for_marketingstudents (){
        $result= $this->select('SELECT `studentit`, (SELECT session.name FROM session WHERE session.sid=new_students.sid) as `session`, `name`,locaion, `course`, `email`, `mobile`  FROM `new_students` WHERE slevel=2 AND followup=1');
        $data = array();

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
}