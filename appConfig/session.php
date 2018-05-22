<?php
/**
 * Created by PhpStorm.
 * User: Ultrabook
 * Date: 3/16/2017
 * Time: 5:14 PM
 */

session_start();

if (!isset($_SESSION['userid'])){
    header('Location: login/index.php');
}