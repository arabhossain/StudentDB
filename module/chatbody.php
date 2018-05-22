<?php
/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/21/2017
 * Time: 3:36 PM
 */

require '../appConfig/dbController.php';
$dbController=new dbController();
$studentid = $_POST['studentid'];

$result=$dbController->select("SELECT `msgid`,userid, (SELECT users.name FROM users WHERE users.uid=newstudentfollowup.userid) as username, `msgtype`, `date`, `msg` FROM `newstudentfollowup` WHERE `studentid`=$studentid ORDER BY date DESC");
if ($result->num_rows > 0){
    session_start();
    $userid=$_SESSION['userid'];
    while($row = $result->fetch_assoc()) {
            if ($row['userid']!=$userid){
                if ($row['msgtype']==1){
                    echo '<li class="clearfix">
                    <div class="message-data align-right">
                        <span class="message-data-name">'.$row['username'].' - on '.$row['date'].'</span> <i class="fa fa-circle me"></i>
                    </div>
                    <div class="message me-message float-right">'.$row['msg'].'</div></li>';
                }

            }else{
                $private='';
                if ($row['msgtype']==0){
                    $private='<span style="color:red;font-style: italic;font-size: smaller;"> [Only you can see this message]</span>';
                }
                echo '<li><div class="message-data">
                        <span class="message-data-name"><i class="fa fa-circle you"></i> You '.$private.' - on '.$row['date'].'</span></div>
                    <div class="message you-message">'.$row['msg'].'</div> </li>';
            }
    }
    exit;
}
else{
    echo "No followup record has been stored yet ! ";
}
?>

