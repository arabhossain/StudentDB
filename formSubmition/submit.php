<?php

/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/16/2017
 * Time: 7:25 PM
 */
$dbconfig=new dbController();
$userid=$_SESSION['userid'];

//Location Page Submition Start
if ($_GET['load']=='locations'){
        if (isset($_POST['btn-location']) && $_POST['txt-location']!=''){
            $locaion=$_POST['txt-location'];

            if ($_POST['btn-location']=='Save'){
                $result=$dbconfig->insert("INSERT INTO `locations`( `name`, `date`, `userid`) VALUES ('$locaion',now(),$userid)");
                if($result){
                    $massage='Location Name Stored Successfully.';
                    header("Location: index.php?load=locations");
                    exit();
                }
            }elseif ($_POST['btn-location']=='Update'){
                $locaionid=$_POST['txt-locationid'];
                $result=$dbconfig->update("UPDATE `locations` SET `name`='$locaion' WHERE `lid`=$locaionid");
                if($result){
                    $massage='Location Name Updated Successfully.';
                    header("Location: index.php?load=locations");
                    exit();
                }
            }
        }
}
//Location Page Submition END

//Course Page Submition Start
if ($_GET['load']=='courses'){
    if (isset($_POST['btn-course']) && $_POST['txt-course']!=''){
        $course=$_POST['txt-course'];
        $cost=$_POST['txt-cost'];
        $lid=$_POST['select-location'];
        if ($_POST['btn-course']=='Save'){
            $result=$dbconfig->insert("INSERT INTO `courses`(`name`, `cost`, `lid`, `date`, `userid`) VALUES ('$course',$cost,$lid,now(),$userid)");
            if($result){
                $massage='Location Name Stored Successfully.';
                header("Location: index.php?load=courses");
                exit();
            }
        }elseif ($_POST['btn-course']=='Update'){
            $courseid=$_POST['txt-courseid'];

            $result=$dbconfig->update("UPDATE `courses` SET `name`='$course',`cost`=$cost,`lid`=$lid, `userid`=$userid WHERE `cid`=$courseid");
                  if($result){
                $massage='Course Name Updated Successfully.';
               header("Location: index.php?load=courses");
                exit();
            }
        }
    }
}
//Courses Page Submition END

//Sessions Page Submition START

if ($_GET['load']=='session'){
    if (isset($_POST['btn-session']) && $_POST['txt-session']!=''){
        $session=$_POST['txt-session'];

        if ($_POST['btn-session']=='Save'){
            $result=$dbconfig->insert("INSERT INTO `session`( `name`, `date`, `userid`) VALUES ('$session',now(),$userid)");
            if($result){
                $massage='Location Name Stored Successfully.';
                header("Location: index.php?load=session");
                exit();
            }
        }elseif ($_POST['btn-session']=='Update'){
            $sessionid=$_POST['txt-sessionid'];
            $result=$dbconfig->update("UPDATE `session` SET `name`='$session' WHERE `sid`=$sessionid");
            if($result){
                $massage='Location Name Updated Successfully.';
                header("Location: index.php?load=session");
                exit();
            }
        }
    }
}
//Session Page Submition END

//New Student Page Submition STAET
if ($_GET['load']=='new-students'){
    if (isset($_POST['btn-newstudent']) && $_POST['txt-name']!=''){
        $name=$_POST['txt-name'];
        $locaion=$_POST['select-location'];
        $courseid=$_POST['select-course'];
        $session=$_POST['select-session'];
        $email=$_POST['txt-email'];
        $mobile=$_POST['txt-mobbile'];
        $source=$_POST['txt-source'];

        if ($_POST['btn-newstudent']=='Save'){
            $result=$dbconfig->insert("INSERT INTO `student`(`name`, `cid`,sid, `email`, `mobile`, `source`, `slevel`, `discount`, `paid`, `admission`, `followup`, `user`)
                                       VALUES ('$name',$courseid,$session,'$email','$mobile','$source',1,0,0,now(),1,$userid)");

            if($result){
                $massage='New Student Added Successfully.';
                header("Location: index.php?load=new-students");
                exit();
            }
        }elseif ($_POST['btn-newstudent']=='Update'){
            $studentid=$_POST['txt-studentid'];
            $result=$dbconfig->update("UPDATE `student` SET `name`='$name',`cid`=$courseid,`sid`=$session,`email`='$email',`mobile`='$mobile',`source`='$source' WHERE `studentit`=$studentid");
            if($result){
                $massage='Location Name Updated Successfully.';
                header("Location: index.php?load=new-students");
                exit();
            }
        }
    }
}
//New Student Page Submition END

//Student Followup Start
if ($_GET['load']=='folloup-newstudents'){
    if (isset($_GET['studentid']) && isset($_POST['txt-msg'])){
        $msg=$_POST['txt-msg'];
        $msg=check_input($msg);
        $studentid=$_GET['studentid'];
        if (isset($_POST['check-msgtype'])){
            $dbconfig->insert("INSERT INTO `newstudentfollowup`( `userid`,studentid, `msgtype`, `date`, `msg`) 
                                VALUES ($userid,$studentid,0,now(),'$msg')");
        }else{
            $dbconfig->insert("INSERT INTO `newstudentfollowup`( `userid`,studentid, `msgtype`, `date`, `msg`) 
                                VALUES ($userid,$studentid,1,now(),'$msg')");
        }

    }
}
function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysql_real_escape_string($data);
}
//Student Followup END
//-------------Promotions---------------------
//NEw student enrooll
if ($_GET['load']=='promotion'){
    if (isset($_GET['class']) && isset($_POST['btn-enroll'])){
        $sql = "UPDATE `student` SET `slevel`=2 WHERE `studentit` in";
        $sql.= "('".implode("','",array_values($_POST['checkbox']))."')";
        $result=$dbconfig->update($sql);
        if($result){
            $massage='Location Name Updated Successfully.';
            header("Location: index.php?load=promotion&class=new-students");
            exit();
        }
    }
}
//Marketting students
if ($_GET['load']=='promotion'){
    if (isset($_GET['class']) && isset($_POST['btn-enroll'])){
        $sql = "UPDATE `student` SET `slevel`=3 WHERE `studentit` in";
        $sql.= "('".implode("','",array_values($_POST['checkbox']))."')";
        $result=$dbconfig->update($sql);
        if($result){
            $massage='Location Name Updated Successfully.';
            header("Location: index.php?load=promotion&class=new-students");
            exit();
        }
    }
}
//---------------Promotions END-------------------
$dbconfig=null;