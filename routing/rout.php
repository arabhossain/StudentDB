<?php
$dbconfig=new dbController();
    $data=array();
    $sql_data=array();
    $form_data=array();
    $sql_data_locations=array();
    $sql_data_course='';
    $sql_data_session=array();
    $massage;
    $userid=$_SESSION['userid'];
    include "loader.php";
    $loader=new loader();

    if (isset($_GET['load'])){
        $page = $_GET['load'];
    }else{
        $data=$loader->dashboard();
    }

//Routing Start
    if (isset($page)){
        if ($page=='locations'){
            if (isset($_GET['action']) && isset($_GET['id'])){
                if ($_GET['action']=='edit'){
                    $id=$_GET['id'];

                    $result=$dbconfig->select("SELECT * FROM `locations` WHERE `lid`=".$id);
                    if ($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $form_data['lid']=$row['lid'];
                        $form_data['name']=$row['name'];
                    }
                }
            }
            list($data,$sql_data)=$loader->locations();
        }elseif ($page=='courses'){
            if (isset($_GET['action']) && isset($_GET['id'])){
                if ($_GET['action']=='edit'){
                    $id=$_GET['id'];

                    $result=$dbconfig->select("SELECT * FROM `courses` WHERE `cid`=".$id);
                    if ($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $form_data['cid']=$row['cid'];
                        $form_data['name']=$row['name'];
                        $form_data['cost']=$row['cost'];
                        $form_data['lid']=$row['lid'];
                    }
                }
            }
            list($data,$sql_data,$sql_data_locations)=$loader->Cources();
        }elseif ($page=='session'){
            if (isset($_GET['action']) && isset($_GET['id'])){
                if ($_GET['action']=='edit'){
                    $id=$_GET['id'];

                    $result=$dbconfig->select("SELECT * FROM `session` WHERE `sid`=".$id);
                    if ($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $form_data['sid']=$row['sid'];
                        $form_data['name']=$row['name'];
                    }
                }
            }
            list($data,$sql_data)=$loader->session();
        }elseif ($page=='new-students'){
            if (isset($_GET['action']) && isset($_GET['id'])){
                if ($_GET['action']=='delete'){
                    $id=$_GET['id'];

                    $result=$dbconfig->select("UPDATE `student` SET followup=0 WHERE `studentit`=".$id);
                    if ($result){
                        header("Location: index.php?load=new-students");
                        exit();
                    }
                }elseif ($_GET['action']=='edit'){
                    $id=$_GET['id'];

                    $result= $dbconfig->select('SELECT `studentit`, `name`,sid, `course`, `Locaion`,lid, (`payable`-(payable*discount)/100) as payable, `email`, `mobile`, `source`, `slevel`, `discount`, `paid`, `admission`, `followup`, `user` FROM `new_students` WHERE studentit='.$id);
                    if ($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $form_data['studentit']=$row['studentit'];
                        $form_data['name']=$row['name'];
                        $form_data['name']=$row['name'];
                        $form_data['sid']=$row['sid'];
                        $form_data['course']=$row['course'];
                        $form_data['locaion']=$row['locaion'];
                        $form_data['email']=$row['email'];
                        $form_data['mobile']=$row['mobile'];
                        $form_data['source']=$row['source'];
                        $form_data['followup']=$row['followup'];
                        $cources=$dbconfig->select('SELECT * FROM `courses` WHERE `lid`='.$row['lid']);
                        if ($cources->num_rows > 0){
                            while($row = $cources->fetch_assoc()) {
                                $option=$row['lid'];
                                $sql_data_course.="<option value='$option' ";
                                if ($row['name']== $form_data['course']){
                                    $sql_data_course.=' selected ';
                                }
                                $sql_data_course.=" >".$row['name']."</option>";
                            }

                        }elseif ( $state=='select'){
                            $sql_data_course= "<option value='select'>Please select location first</option>";
                        }
                        else{
                            $sql_data_course= "<option value='select'>No course is available in this location</option>";
                        }
                    }
                }
            }
            list($data,$sql_data,$sql_data_locations,$sql_data_session)=$loader->new_students();
        }elseif ($page=='folloup-newstudents'){
            if (isset($_GET['studentid'])){
                $id=$_GET['studentid'];
                list($data,$sql_data)=$loader->newstudentfollowup($id);
            }
        }elseif ($page=='promotion'){
            if (isset($_GET['class'])){
                if ($_GET['class']=='new-students'){
                    list($data,$sql_data)=$loader->promo_newstudent();
                }elseif ($_GET['class']=='marketing-students'){
                    list($data,$sql_data)=$loader->promo_marketingtudent();
                }
            }
        }elseif ($page=='logout'){
            session_start();
            session_destroy();
            $dbconfig->update("UPDATE `users` SET `lastactivity`=now(),`isonline`=0 WHERE`uid`=$userid");
            header('Location: login/index.php');
            exit;
        }
        else{
            $data=$loader->page_not_found();
        }
    }else{
        $data=$loader->dashboard();
    }

