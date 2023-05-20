<?php
session_start();
session_unset();
session_destroy();
header('location: ../Introduction/Introduction.php#registration-login');
?>