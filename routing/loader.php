<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/16/2017
 * Time: 5:51 PM
 */

class loader
{
    private $data=array();
    private  $sql_data=array();
    public function locations(){
        $data['title']='Locaions';
        require 'module/locaions.php';
        $getData=new locaions();
        $sql_data= $getData->get_locaions();
        include 'formSubmition/submit.php';
        $data['content']=('views/locations.php');
        return array($data,$sql_data);
    }
    public function Cources(){
        $data['title']='Cources';
        require 'module/courses.php';
        $getData=new courses();
        $sql_data= $getData->get_course();
        $sql_data_locations= $getData->get_locaions();
        include 'formSubmition/submit.php';
        $data['content']=('views/courses.php');
        return array($data,$sql_data,$sql_data_locations);
    }
    public function session(){
        $data['title']='Session';
        require 'module/session.php';
        $getData=new session();
        $sql_data= $getData->get_sessions();
        include 'formSubmition/submit.php';
        $data['content']=('views/sessions.php');
        return array($data,$sql_data);
    }
    public function new_students(){
        $data['title']='New Students';
        require 'module/new_students.php';
        $getData=new new_students();
        $sql_data= $getData->get_new_students();
        include 'formSubmition/submit.php';
        $data['content']=('views/new_students.php');
        
        require 'module/courses.php';
        $getData_l=new courses();
        $sql_data_locations= $getData_l->get_locaions();

        require 'module/session.php';
        $sql_data_session=new session();
        return array($data,$sql_data,$sql_data_locations,$sql_data_session->get_sessions());
    }
    public function newstudentfollowup($id){
        $data['title']='Follow Up';
        include 'formSubmition/submit.php';
        $data['content']=('views/newstudentfollowup.php');

        require 'module/newfollowupstudent.php';
        $getData=new newfollowupstudent();
        $sql_data= $getData->getnewfollowupstudent($id);
        return array($data,$sql_data);
    }
    public function promo_newstudent(){
        $data['title']='Promotion New Students';
        require 'module/new_students.php';
        $getData=new new_students();
        include 'formSubmition/submit.php';
        $sql_data= $getData->get_new_students_for_promotion();
        $data['content']=('views/promotion_newstudent.php');
        return array($data,$sql_data);
    }
    public function promo_marketingtudent(){
        $data['title']='Promotion Marketing Students';
        require 'module/new_students.php';
        $getData=new new_students();
        include 'formSubmition/submit.php';
        $sql_data= $getData->get_new_students_for_marketingstudents();
        $data['content']=('views/promotion_markettingStudents.php');
        return array($data,$sql_data);
    }
    public function dashboard(){
        $data['title']='Dashboard';
        $data['content']=('views/dashboard.php');
        return $data;
    }
    public function page_not_found(){
        $data['title']='404 Error';
        $data['content']=('views/locations.php');
        return $data;
    }

}