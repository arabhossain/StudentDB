<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/21/2017
 * Time: 5:29 PM
 */
class newfollowupstudent extends dbController
{
    public function getnewfollowupstudent($id){
        $form_data=array();
        $result= $this->select('SELECT `studentit`, `name`,sid, `course`, `Locaion`,lid, (`payable`-(payable*discount)/100) as payable, `email`, `mobile`, `source`, `slevel`, `discount`, `paid`, `admission`, `followup`, (SELECT users.name FROM users WHERE users.uid=new_students.user) as `username` FROM `new_students` WHERE studentit='.$id);
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $form_data['studentit']=$row['studentit'];
            $form_data['name']=$row['name'];
            $form_data['name']=$row['name'];
            $form_data['username']=$row['username'];
            $form_data['course']=$row['course'];
            $form_data['locaion']=$row['locaion'];
            $form_data['email']=$row['email'];
            $form_data['mobile']=$row['mobile'];
            $form_data['source']=$row['source'];
            $form_data['followup']=$row['followup'];
            $form_data['admission']=$row['admission'];
            
        }
        return $form_data;
    }
}