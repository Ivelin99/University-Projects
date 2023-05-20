<?php 
require('../Introduction/Additional Files/ControllerUserData.php');
?>
<!DOCTYPE html>
<html lang = "en-US">
<head>
<meta charset = "UTF-8">
<title> Introduction </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../Introduction/Introduction.css"/> <!-- Връзка с файла със CSS --> 
</head>
<body>

<div class = "main">

<div class = "navmenu">
  
  <div class = "navmenu-links">
  <a id="nav_about" href = "#about" class = "active"> About </a>
  <a id="nav_tutorial" href = "#tutorial"> Video Tutorial </a>
  <a id="nav_registration-login" href = "#registration-login"> Registration / Login </a>
  </div>  
  
  <button onclick = "changeTheme(); ThemeBackgroundColor()" id = "theme"><i class = "fa fa-adjust"></i> Change Theme </button>
  
  <button onclick = "BackgroundColor()" id = "translate-button"><i class = "fa fa-globe"></i> Change Language </button>
  <div id = "google_translate_element">
  <script src = "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>   
  </div>
  
</div>

<div class = "container">

<section class="about-website" id = "about">
    <div name = "about" class = "section">
    <?php
    $intro_result = mysqli_query($connDatabase, "SELECT * FROM `other_data` WHERE `ID` = 2");
    $checkIntroResult = mysqli_num_rows($intro_result);
    if ($checkIntroResult > 0) {
	while (($rows = mysqli_fetch_assoc($intro_result))) {
		$Intro = $rows['Name'];
        echo $Intro;
    }
    }
    ?>
    </div>
</section>
	
<section class="video-tutorial" id = "tutorial">	
    <div name = "tutorial" class = "section">
    
    </div>
</section>

<section class="registration-login" id = "registration-login">
    <div name = "registration-login" class = "section">
	<div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Log In
            </div>
            <div class="title signup">
               Sign Up
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="../Introduction/Introduction.php#registration-login" class="login" method = "POST">
			   <?php
                    if(count($LoginErrors) == 1) {
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($LoginErrors as $showLoginError) {
                                echo $showLoginError;
                            }
                            ?>
                        </div>
                        <?php
                    } elseif(count($LoginErrors) > 1) {
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($LoginErrors as $showLoginError) {
                                ?>
                                <li><?php echo $showLoginError; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                  <div class="field">
				  <div class="form-group">
				  <div class = "icons">
	              <i class="fa fa-user icon"></i>
                     <input type="text" class="form-control form-control-user" name="Email" placeholder="Enter Email" required>
                  </div>
				  </div>
				  </div>
                  <div class="field">
				  <div class="form-group">
				  <div class = "icons">
				  <i class="fa fa-key icon"></i>
                     <input type="password" class="form-control form-control-user" name="Password" id = "Repeated_Password" placeholder="Enter Password" required>
				  </div>
				  <span class = "repeated-password-icon"><i class="bi bi-eye-slash" id="togglePassword2"></i></span>
                  </div>
				  </div>
                  <div class="pass-link">
                     <a href="../Introduction/Additional Files/forgot-password.php">Forgot password?</a>
                  </div>  
					 <input type="reset" value="Clear">
                     <input type="submit" name="Login" value="Login">
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form action="../Introduction/Introduction.php#registration-login" class="signup" method = "POST">
			        <?php
                    if(count($SignupErrors) == 1) {
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($SignupErrors as $showSignUpError) {
                                echo $showSignUpError;
                            }
                            ?>
                        </div>
                        <?php
                    } elseif(count($SignupErrors) > 1) {
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($SignupErrors as $showSignUpError) {
                                ?>
                                <li><?php echo $showSignUpError; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                  <div class="field">
				  <div class="form-group">
				  <div class = "icons">
	              <i class="fa fa-envelope icon"></i>
                     <input type="text" class="form-control form-control-user" name="Email" placeholder="Enter Email" required>
                  </div>
				  </div>
				  </div>
				  <div class="field">
				  <div class="form-group">
				  <div class = "icons">
	              <i class="fa fa-user icon"></i>
                     <input type="text" class="form-control form-control-user" name="Username" placeholder="Enter Username" required>
                  </div>
				  </div>
				  </div>
                  <div class="field">
				  <div class="form-group">
				  <div class = "icons">
				  <i class="fa fa-key icon"></i>
                     <input type="password" class="form-control form-control-user" name="Password" id = "Password" placeholder="Enter Password" required>
				  </div>
				  <span class = "password-icon"><i class="bi bi-eye-slash" id="togglePassword"></i></span>
                  </div>
				  </div>
                  <div class="field">
				  <div class="form-group">
				  <div class = "icons">
				  <i class="fa fa-key icon"></i>
                     <input type="password" class="form-control form-control-user" name="Confirm_Password" id = "Confirm_Password" placeholder="Confirm password" required>
				  </div>
				  <span class = "confirm-password-icon"><i class="bi bi-eye-slash" id="toggleConfirmPassword"></i></span>
                  </div>
				  </div>
				  <div class="contract-link">
				  By creating an account you agree to our <a href="#">Terms & Privacy</a>.
				  </div>
					 <input type = "reset" value = "Clear">
                     <input type="submit" name="Signup" value="Signup">
				  <div class = "login-link"> 
				  Already have an account? <a href = ""> Login now </a>
				  </div>
               </form>
            </div>
         </div>
	  </div>
	</div>
</section>

</div>

</div>

<script src = "../Introduction/Introduction.js"></script> <!-- Връзка с файла с Javascript и JQuery --> 

</body>
</html>