<?php
session_start();
// Connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_for_users";
 
$conn = mysqli_connect($servername, $username, $password, $dbname); 

error_reporting(0);

// Insert Data into Database
if(isset ($_POST['submit'])) {

$em = $_POST['Email'];
$ur = $_POST['Username'];
$pd = $_POST['Password'];
$cmpd = $_POST['Confirm_Password'];

 if($em != "" && $ur != "" && $pd != "" && $cmpd != "") {
  $sql = "INSERT INTO registration VALUES ('','$em','$ur','$pd','$cmpd');";
  $data = mysqli_query($conn, $sql);
 }
  // Print user's name after registration
  $urprint = "SELECT * FROM registration WHERE Username = '$ur' ";
  $print = mysqli_query($conn, $urprint); 
  $total = mysqli_num_rows($print); 
  
 if($total == 1) {
	  $_SESSION['user_name'] = $ur;
 }
} 
?>