
<?php
if(isset($_POST['get_option']))
{
    require '../appConfig/dbController.php';
    $dbController=new dbController();
    $state = $_POST['get_option'];

    $result=$dbController->select("SELECT `cid`, `name` FROM `courses` WHERE `lid`='$state'");
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $option=$row['cid'];
         echo "<option value='$option'>".$row['name']."</option>";
        }
        exit;
    }elseif ( $state=='select'){
        echo "<option value='select'>Please select location first</option>";
    }
    else{
        echo "<option value='select'>No course is available in this location</option>";
    }


}
?>