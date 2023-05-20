<?php
include ("Свързване_Вмъкване_Избиране_Информация_в_базата_данни.php");
?>
<!DOCTYPE html>
<html lang = "bg-BG">
<head>
<meta charset = "UTF-8">
<title> Приложение </title>
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
  
body {
    font:150% arial;
    color: #000;
    text-align:center;
    padding:0; 
	}  
	
form, p, span {
    margin:0;
    padding:0; 
	}
	
input { 
font: 100% arial; 
}  

a {
    color:#0000FF;
    text-decoration:none; 
	}
	
    a:hover { 
	text-decoration:underline; 
	}
  
#wrapper {
    margin:0 auto;
    padding-bottom:0;
    background-image: url("crystal.jpg");
	height: 100%;
    width:100%;	
	} 
	
#chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:2%;
    padding:1%;
    background:#fff;
    height:70%;
    width:80%;
    border:2px solid #2a9df4;
    overflow:auto; 
	}
  
    #chatbox div {
        background-color: #b7b7b7;
    }
#usermsg {
    width:73.8%;
    border:2px solid #2a9df4;
	margin-bottom: 30px;
	}
  
#submitmsg { 
width: 5.7%; 
background-color: white;
color: #2a9df4;	
border: solid;
cursor: pointer;
opacity: 0.9;
}
  
#menu { padding:1% 2% 1% 1%; }
  
.welcome { 
float:left;
color:blue; 
margin-top: 15px;
margin-bottom: 0px;
}
  
.logout { 
float:right; 
color: blue;
border: none;
margin-bottom: 0px;
margin-right: 0px; 
}
  
.msgln { 
margin:0 
0 3% 0; 
}

img {
float:left;
margin-bottom: 0px;
margin-right: 50px;

}

.marquee {
width: 70%;
}

</style>
<script defer src="http://localhost:3000/socket.io/socket.io.js"></script>
<script defer src="script.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script>
// jQuery Document
$(document).ready(function(){
// Ако потребителят иска да напусне стаята.
 $("#exit").click(function(){
		var exit = confirm("Наистина ли искате да напуснете стаята?");
		if(exit==true){
		window.location = 'Регистрация.php';
		}		
	});
});
</script>
<body>
<div id="wrapper">
<img src="logo.png" style="width:110px">
    <div id="menu">
        <marquee behaviour="scroll" direction="right" class="marquee"><p class="welcome">Добре дошли, <b><i><?php session_start(); echo $_SESSION['user_name'];?></i></b> във вашата лична чат стая!</p></marquee>
        <p class="logout"><a id="exit" href="#">Изход от чата</a></p>
        <div style="clear:both"></div>
    </div>
    <div id="chatbox"></div>  
    <form name="message" id="send">
        <input name="usermsg" type="text" id="usermsg">
        <input name="submitmsg" type="submit"  id="submitmsg" value="Изпрати">
    </form>
</div>
</body>
</html>
