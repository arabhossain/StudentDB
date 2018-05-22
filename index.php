<?php
include('appConfig/config.php');
if(!isset($data['title'])){
    $data['title']='No Title Found';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title']; ?> | Tegra</title>
    <link  rel="stylesheet" type="text/css" href="css/main.css">
    <link  rel="stylesheet" type="text/css" href="css/chat.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="js/jquery.mask.js"></script>
</head>
<body>

<header>
    <div class="title">
        <div class="logo"><a href="index.php"><img src="img/logo.png"></a></div>
        <div class="slogan">Student Database</div>
    </div>
    <div class="search-area">
        <div class="s-box">
            <form>
            <input type="text" name="txt-search" placeholder="Student info...">
            <input type="submit" name="btn-search" value="Search">
                </form>
        </div>
    </div>
</header>

    <nav>
        <ul>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">User Menu</a>
                <div class="dropdown-content">
                    <a href="#">View Account</a>
                    <a href="#">Edit Account</a>
                    <a href="index.php?load=logout">Logout</a>
                </div>
            </li>
            <li><a <?php if ($data['title']=='Locaions'){echo ' class="active" ';}?> href="index.php?load=locations">Locations</a></li>
            <li><a <?php if ($data['title']=='Cources'){echo ' class="active" ';}?> href="index.php?load=courses">Courses</a></li>
            <li><a <?php if ($data['title']=='Session'){echo ' class="active" ';}?> href="index.php?load=session">Session</a></li>
            <li><a  <?php if ($data['title']=='New Students' || $data['title']=='Follow Up'){echo ' class="active" ';}?> href="index.php?load=new-students">New Students</a></li>
            <li class="dropdown  <?php if ($data['title']=='Promotion New Students'){echo ' active';}?>">
                <a href="javascript:void(0)" class="dropbtn">Promotions</a>
                <div class="dropdown-content">
                    <a  <?php if ($data['title']=='Promotion New Students'){echo ' class="drop-active" ';}?> href="index.php?load=promotion&class=new-students">New Students Enroll</a>
                    <a <?php if ($data['title']=='Promotion Marketing Students'){echo ' class="drop-active" ';}?> href="index.php?load=promotion&class=marketing-students">Marketing Students</a>
                </div>
            </li>
            <li><a href="#">Enrolled Students</a></li>
        </ul>
    </nav>

<div class="contener">
    <?php include $data['content'];?>
</div>
<footer>Copyright &copy; Tegradesign.com</footer>
</body>
</html>