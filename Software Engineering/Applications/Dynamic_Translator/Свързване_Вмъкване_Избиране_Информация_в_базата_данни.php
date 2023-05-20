<?php
session_start();
// Свързване с базата данни
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";
 
$connect = mysqli_connect($servername, $username, $password, $dbname); 

error_reporting(0);

// Вмъкване на данни в базата данни
if(isset ($_POST['Регистрирай'])) {

$el = $_POST['Имейл'];
$un = $_POST['Потребителско_име'];
$pr = $_POST['Парола'];
$cmpr = $_POST['Потвърдете_парола'];

 if($el != "" && $un != "" && $pr != "" && $cmpr != "") {
  $sql = "INSERT INTO register VALUES ('','$el','$un','$pr','$cmpr'); ";
  $info = mysqli_query($connect, $sql);
 }
  // Извеждане на потребителското име след регистрация
  $uprint = "SELECT * FROM register WHERE Потребителско_име = '$un' ";
  $view = mysqli_query($connect, $uprint); 
  $row = mysqli_num_rows($view); 
  
 if($row == 1) {
	  $_SESSION['user_name'] = $un;
 }
} 
?>