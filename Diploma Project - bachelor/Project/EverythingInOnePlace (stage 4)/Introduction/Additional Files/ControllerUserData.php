<?php 
session_start();
require('Connection_To_Database.php');
$email = "";
$username = "";
$SignupErrors = array();
$errors = array();
$LoginErrors = array();

//if user clicks signup button
if (isset($_POST['Signup'])) {
    $username = mysqli_real_escape_string($connDatabase, $_POST['Username']);
    $email    = mysqli_real_escape_string($connDatabase, $_POST['Email']);
    $password = mysqli_real_escape_string($connDatabase, $_POST['Password']);
    $cpassword = mysqli_real_escape_string($connDatabase, $_POST['Confirm_Password']);
	
	$uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\_w]@', $password);
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $SignupErrors['Email'] = "Invalid email format! Please enter a valid email address!";
    }
	if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
		$SignupErrors['Password'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one lower case letter, 
		one number, and one special character.";
	} 
    if ($password !== $cpassword) {
        $SignupErrors['Password'] = "Confirm password not matched!";
    }
	
    $email_check = "SELECT * FROM `user_data` WHERE `Email` = '$email'";
    $res = mysqli_query($connDatabase, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $SignupErrors['Email'] = "The email that you have entered already exists!";
    }
    if (count($SignupErrors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO `user_data` (`Email`, `Username`, `Password`, `Code`, `Status`)
                        values('$email', '$username', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($connDatabase, $insert_data);
        if ($data_check) {
            $subject = "Email Verification Code";
            $message = "Your verification code is $code.";
            $sender = "From: ivo.avenger.99@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['Email'] = $email;
                $_SESSION['Password'] = $password;
                header('location: ../Introduction/Additional Files/user-otp.php');
                exit();
            } else {
                $SignupErrors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $SignupErrors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user clicks verification code submit button
    if (isset($_POST['check'])) {
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($connDatabase, $_POST['otp']);
        $check_code = "SELECT * FROM `user_data` WHERE `Code` = '$otp_code'";
        $code_res = mysqli_query($connDatabase, $check_code);
        if (mysqli_num_rows($code_res) > 0) {
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['Code'];
            $email = $fetch_data['Email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE `user_data` SET `Code` = '$code', `Status` = '$status' WHERE `Code` = '$fetch_code'";
            $update_res = mysqli_query($connDatabase, $update_otp);
            if ($update_res) {
                $_SESSION['Username'] = $username;
                $_SESSION['Email'] = $email;
                header('location: ../../Main/Test.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while updating code!";
            }
        } else {
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user clicks login button
    if (isset($_POST['Login'])) {
        $email = mysqli_real_escape_string($connDatabase, $_POST['Email']);
        $password = mysqli_real_escape_string($connDatabase, $_POST['Password']);
        $check_email = "SELECT * FROM `user_data` WHERE `Email` = '$email'";
        $res = mysqli_query($connDatabase, $check_email);
        if (mysqli_num_rows($res) > 0) {
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['Password'];
            if (password_verify($password, $fetch_pass)) {
                $_SESSION['Email'] = $email;
                $status = $fetch['Status'];
                if ($status == 'verified') {
                  $_SESSION['Email'] = $email;
                  $_SESSION['Password'] = $password;
                    header('location: ../Main/Test.php');
                } else {
                    $info = "It looks like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: ../Introduction/Additional Files/user-otp.php');
                }
            } else {
                $LoginErrors['Email'] = "Incorrect email or password!";
            }
        } else {
            $LoginErrors['Email'] = "It looks like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user clicks continue button in forgot password form
    if (isset($_POST['check-email'])) {
        $email = mysqli_real_escape_string($connDatabase, $_POST['Email']);
        $check_email = "SELECT * FROM `user_data` WHERE `Email` = '$email'";
        $run_sql = mysqli_query($connDatabase, $check_email);
        if (mysqli_num_rows($run_sql) > 0) {
            $code = rand(999999, 111111);
            $insert_code = "UPDATE `user_data` SET `Code` = '$code' WHERE `Email` = '$email'";
            $run_query =  mysqli_query($connDatabase, $insert_code);
            if ($run_query) {
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: ivo.avenger.99@gmail.com";
                if (mail($email, $subject, $message, $sender)) {
                    $info = "We've sent a password reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['Email'] = $email;
                    header('location: reset-code.php');
                    exit();
                } else {
                    $errors['otp-error'] = "Failed while sending code!";
                }
            } else {
                $errors['db-error'] = "Something went wrong!";
            }
        } else {
            $errors['Email'] = "This email address does not exist!";
        }
    }

    //if user clicks check reset otp button
    if (isset($_POST['check-reset-otp'])) {
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($connDatabase, $_POST['otp']);
        $check_code = "SELECT * FROM `user_data` WHERE `Code` = '$otp_code'";
        $code_res = mysqli_query($connDatabase, $check_code);
        if (mysqli_num_rows($code_res) > 0) {
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['Email'];
            $_SESSION['Email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        } else {
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user clicks change password button
    if (isset($_POST['change-password'])) {
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($connDatabase, $_POST['Password']);
        $cpassword = mysqli_real_escape_string($connDatabase, $_POST['Confirm_Password']);
		
	    $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
		
		if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
		$errors['Password'] = "Password should be at least 8 characters in length and should include at least one upper case letter, 
		one number, and one special character.";
	    }
        if($password !== $cpassword) {
            $errors['Password'] = "Confirm password not matched!";
        } else {
            $code = 0;
            $email = $_SESSION['Email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE `user_data` SET `Code` = '$code', `Password` = '$encpass' WHERE `Email` = '$email'";
            $run_query = mysqli_query($connDatabase, $update_pass);
            if ($run_query) {
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            } else {
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])) {
        header('Location: ../../Introduction/Introduction.php#registration-login');
    }
?>