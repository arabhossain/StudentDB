<?php
session_start();
if (isset($_SESSION['userid'])){
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login | Tegra</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Tegra </h1><span>Student Database <i class='fa fa-paint-brush'></i> + <i class='fa fa-code'></i> by <a href='http://tegradesign.com'>TegraDesign </a></span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">click me</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form method="post" action="index.php">
      <input type="text" name="username" placeholder="Username"/>
      <input type="password" name="userpass" placeholder="Password"/>
      <button name="btn-login" value="login">Login</button>
    </form>
  </div>
  <div class="form">
    <h2>Create an account</h2>
    <form method="post" action="index.php">
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button value="login">Register</button>
    </form>
  </div>
<!--  <div class="cta"><a href="https://facebook.com/arabhossain">Forgot your password?</a></div>-->
</div>
  <script src='js/jquery.min.js'></script>
<script src='js/vLmRVp.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
<?php
if (isset($_POST['btn-login'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentdb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email=$_POST['username'];
    $userpass=$_POST['userpass'];
    $result=$conn->query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$userpass'");

    var_dump($result);
    if ($result->num_rows ==1){
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['userid']= $row['uid'];
        $userid=$row['uid'];
        $_SESSION['name']= $row['name'];
        $_SESSION['email']= $row['email'];
        $_SESSION['isonline']= 1;
        $conn->query("UPDATE `users` SET `lastactivity`=now(),`isonline`=1 WHERE`uid`=$userid");
        header("Location: ../index.php");
        $conn->close();
        exit();
    }
}
?>