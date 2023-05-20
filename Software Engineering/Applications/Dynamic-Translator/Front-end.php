<?php
include ("Connection_Insert_Select_Data_to_Database.php");
?>
<!DOCTYPE html>
<html lang = "en-US">
<head>
<meta charset = "UTF-8">
<title> Registration </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
<style>
* {
  box-sizing: border-box;
}

body, html {
  height: 100%;
  margin: 0;
}

.background {
  background-image: url("world3.jpg");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.form {
  position: absolute;
  top: 47%;
  left: 50%;
  transform: translate(-50%, -50%);
  margin: 20px;
  max-width: 400px;
  padding: 20px;
  background-color: #000000;
  opacity: 0.8;
  border: solid 1px;
  border-color: #99d6e6;
}

h1 {
font-size: 30px;
color: white;
border: 1 px;
border-style: solid;
border-color: white;
padding: 10px;
margin: 5px;
margin-bottom:15px;
}

.register {
  background-color: #45b4d4;
  color: black;	
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.9;
  margin-right: 1%;
  width: 47%;
}

.register:hover {
opacity: 1;	
}

.clear {
  background-color: white;
  color: black;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.9;
  margin-left: 2%;
  width: 47%;
  margin-bottom: 1px;
  margin-top: 8px;
}

.clear:hover {
opacity: 1;
}

input[type=text], input[type=password], input[type=email] {
   width: 98.5%;
   padding: 6px;
   border: solid 1px #99d6e6;
   margin-top: 4px;
   margin-left: 2px;
   margin-right:6px;
   }

.p1{
font-size: 13px;
margin-left: 6px;
margin-top: 2px;
margin-bottom; 10px;
color: white;
}

p{
margin: 2px;
padding-bottom: 3px;
padding-top: 1px;
color: white;
}
.p0{float: left;
margin-top: 0px;}
.check{float: left;
margin-top:7px;}

</style>

<script>
function password() {
 var x = document.getElementById("Password");
 if (x.type === "password") {
     x.type = "text";
   } else {
     x.type = "password";
  }
}
function password1() {
 var y = document.getElementById("Confirm Password");
 if (y.type === "password") {
    y.type = "text";
   } else {
     y.type = "password";
  }
}
function reg() { 
var username = document.getElementById("Username");
var email = document.getElementById("Email");
var pass = document.getElementById("Password");
var pass1 = document.getElementById("Confirm Password");
var symbols = /^[^]+@[^]+\.[a-z]{2,3}$/;

  if (email.value.match(symbols) == null ) {
     alert("Enter a valid email address!"); return false;
    } 
  if (username.value == "")  {
     alert("No user name entered!"); return false;
    }
  if (pass.value == "")  {
     alert("No password entered!"); return false;
    }
  if (pass.value.length < 8) {
     alert("The password must contain minimum 8 symbols!"); return false;
    } 
  if (pass.value !== pass1.value) {
     alert("The two passwords must be equal!"); return false;
    }
else { return true; } 
}
</script>
</head>
<body>

 <div class = background></div>
 <form onsubmit = "return reg()" action = "Application.php" class = "form" method = "POST">
 <h1> Registration for users </h1>
 <b><p> Email: </p></b> <input type = "email" name="Email" placeholder = "Type Email" id = "Email"> <br> <br>
 <b><p> Username: </p></b> <input type="text" name="Username" placeholder = "Type Username" id="Username"> <br> <br>
 <b><p> Password: </p></b> <input type = "password" name="Password" placeholder = "Type Password" id = "Password" > <br> 
        <input type="checkbox" class="check" onclick="password()"> <p class="p0"> Show password </p> <br> <br>
 <b><p> Confirm Password: </p></b> <input type = "password" name="Confirm_Password" placeholder = "Confirm Password" id = "Confirm Password"> <br>
	                       <input type="checkbox" class="check" onclick="password1()"> <p class="p0"> Show password </p> <br> <br>
 <p class="p1">By registering you agree to our <a href="#">Terms & Privacy</a>.</p>						   
 <input type = "submit" class = "register" id = "register" name ="submit" value = "Register">
 <input type = "reset" class = "clear" value = "Clear">
 </form>
</body>
</html>