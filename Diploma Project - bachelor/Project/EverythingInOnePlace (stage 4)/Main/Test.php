<?php
require('../Main/Additional Files/Queries.php');
require('../Introduction/Additional Files/ControllerUserData.php');
?>
<?php 
$email = $_SESSION['Email'];
$password = $_SESSION['Password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM `user_data` WHERE `Email` = '$email'";
    $run_Sql = mysqli_query($connDatabase, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['Status'];
        $code = $fetch_info['Code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: ../Introduction/Additional Files/reset-code.php');
            }
        } else {
            header('Location: ../Introduction/Additional Files/user-otp.php');
        }
    }
} else {
    header('Location: ../Introduction/Introduction.php#registration-login');
}
?>
<!DOCTYPE html>
<html lang = "en-US">
<head>
<meta charset = "UTF-8">
<title> Main </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../Main/Additional Files/Products.css"/> <!-- Връзка с файла със CSS --> 
</head>

<body>
<div class = "header" style = "background-image:url('
<?php
if ((isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) || (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid']))) {
$result1 = mysqli_query($connDatabase, $query1);
$checkResult1 = mysqli_num_rows($result1);
if ($checkResult1 > 0) {
	while ($rows = mysqli_fetch_assoc($result1)) {
	$HeaderImage = $rows['header_image'];
	echo $HeaderImage; 
	}
}
}
?>')">
<h1 style = "color:black">
<?php
if (!((isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) || (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid'])))) {
?>
Everything In One Place
<?php	
}
?>
<?php
if (isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) { 
$result1 = mysqli_query($connDatabase, $query1);
$checkResult1 = mysqli_num_rows($result1);
if ($checkResult1 > 0) {
	while ($rows = mysqli_fetch_assoc($result1)) {
	$HeaderName = $rows['header_name'];
	echo $HeaderName;		
	}
}
}
if (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid'])) {
$result5 = mysqli_query($connDatabase, $query5);
$checkResult5 = mysqli_num_rows($result5);
if ($checkResult5 > 0) {
	while ($rows = mysqli_fetch_assoc($result5)) {		
	$HeaderName = $rows['header_name'];
     echo $HeaderName;
	}
}
}	
	?> 
</h1>
</div>

<div class = "categories" id = "category-width">
<?php if ((isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) || (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid']))) {
	?>
  <span class = "NavMenu" onclick="OpenCloseNavigation()" title = "Navigation Menu">
  <div id = "genres"> Subcategories </div> 
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>  
  </span>
<?php } ?>
  
  <div class = "links" id = "category">
  <?php
  $result0 = mysqli_query($connDatabase, $query0);
  $checkResult0 = mysqli_num_rows($result0);
  if ($checkResult0 > 0) {
	while (($rows = mysqli_fetch_assoc($result0))) {
		$CategoryID = $rows['category_id'];
		$CategoryNames = $rows['category_name'];
        echo "<a href = 'Test.php?categoryid=$CategoryID'>$CategoryNames</a>";
    }
  } else {
	  echo "There are no categories added yet. Please check again later!";
  }
  ?>
  </div>
  
  <a href="../Introduction/Introduction.php#registration-login" id = "logout"> Logout </a>
  
  <button onclick = "changeTheme(); ThemeBackgroundColor()" id = "theme"><i class = "fa fa-adjust"></i> Change Theme </button>
  
  <button onclick = "BackgroundColor2()" id = "translate-button"><i class = "fa fa-globe"></i> Change Language </button>
  <div id = "google_translate_element">
  <script src = "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>   
  </div>
  <?php if ((isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) || (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid']))) {
	  ?>
  <button onclick = "BackgroundColor1()" id = "search-button" title = "Search Engine"><i class = "fa fa-search"></i></button>
  <div class = "search-bar">
  <div class="col-md-6">
  <input type = "text" name = "search_data" id = "search_data" class="form-control" placeholder = "Search information here"/>
  </div>
  </div>
  <?php } ?>  
</div>

<div class = "genres" id = "SideNavigation">
    <ul>
	<?php
	if ((isset($_GET['categoryid']) && is_numeric($_GET['categoryid']))) {
	$result4 = mysqli_query($connDatabase, $query4);
	$checkResult4 = mysqli_num_rows($result4);
	if ($checkResult4 > 0) {
		while ($rows = mysqli_fetch_assoc($result4)) {
        $SubcategoryID = $rows['subcategory_id'];			
		$SubcategoryNames = $rows['subcategory_name'];
		echo "<li><a href = 'Test.php?subcategoryid=$SubcategoryID'>$SubcategoryNames</a></li><br>";
	}
	} else {
	  echo "There are no subcategories added yet. Please check again later!";
    }
	}
	
	if (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid'])) {
	$result7 = mysqli_query($connDatabase, $query7);
	$checkResult7 = mysqli_num_rows($result7);
	if ($checkResult7 > 0) {
		while ($rows = mysqli_fetch_assoc($result7)) {
        $SubcategoryID = $rows['subcategory_id'];			
		$SubcategoryNames = $rows['subcategory_name'];
		echo "<li><a href = 'Test.php?subcategoryid=$SubcategoryID'>$SubcategoryNames</a></li><br>";
	}
	} else {
	  echo "There are no subcategories added yet. Please check again later!";
    }
	}
    ?>
    </ul>
</div>

<div class = "content" id = "content-width">
<?php if (!((isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) || (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid'])))) {
	  ?>
<h1 style = "position:relative; top:18%; width:90%; margin:0 auto; padding:4px 12px;"> Hello, <?php echo $fetch_info['Username'] ?>! </h1>
<p style = "position:relative; top:18%; width:90%; margin:0 auto; padding:4px 12px;">
<?php
    $welcome_result = mysqli_query($connDatabase, "SELECT * FROM `other_data` WHERE `ID` = 3");
    $checkWelcomeResult = mysqli_num_rows($welcome_result);
    if ($checkWelcomeResult > 0) {
	while (($rows = mysqli_fetch_assoc($welcome_result))) {
		$WelcomeText = $rows['Name'];
        echo $WelcomeText;
    }
    }
?>
</p>
<?php } ?>

<?php if ((isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) || (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid']))) {	
	  ?>
	  
<div style = "display:flex">
<div class = "multimedia-products">

<div id = "dynamic_content" style = "color:white"></div>

<!--
if (isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) 
$result2 = mysqli_query($connDatabase, $query2);
$checkResult2 = mysqli_num_rows($result2);
if ($checkResult2 > 0) {
	 while ($rows = mysqli_fetch_assoc($result2)) {
		$ProductImages = $rows['product_image'];
		$ProductNames = $rows['product_name'];
        echo "<button class = 'openBtn'><img src = '$ProductImages'/><p> $ProductNames </p></button>";
	 }
}
}
if (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid'])) {
$result6 = mysqli_query($connDatabase, $query6);
$checkResult6 = mysqli_num_rows($result6);
if ($checkResult6 > 0) {
	 while ($rows = mysqli_fetch_assoc($result6)) {
		$ProductImages = $rows['product_image'];
		$ProductNames = $rows['product_name'];
        echo "<button class = 'openBtn'><img src = '$ProductImages'/><p> $ProductNames </p></button>";
	 }
}
}	 
-->

<?php
$result = mysqli_query($connDatabase, $content_query);
$checkResult = mysqli_num_rows($result);
if ($checkResult > 0) {
	 while ($rows = mysqli_fetch_assoc($result)) {
		$ProductNames = $rows['product_name'];
		$ProductHeaderImage = $rows['product_header_image'];
		$ProductYear = $rows['product_year'];
		$ProductCreator = $rows['product_creator'];
		$IMDb = $rows['IMDb'];
	    $ProductDescription = nl2br($rows['product_description']);
		$ProductTrailers = $rows['product_trailers'];
		$ProductLinks = nl2br($rows['product_links']);
		$ProductPerformance = $rows['product_performance'];
		 ?>
   <!-- The Modal -->
   <div class="modal" style = "z-index:9999;">
   <!-- Modal content -->
   <div class="modal-content">
    <span class = "close">&times;</span>
	
    <div class = "header" style = "background-image:url('<?php echo $ProductHeaderImage; ?>')">
	 <div class="transwindow">
     <p> <?php echo $ProductNames; ?> <br>
     Year: <?php echo $ProductYear; ?> &nbsp; <?php echo $ProductCreator; ?> </p>
	 <p style = "float:right"> <?php echo $IMDb; ?></p>
     </div>
	</div>
	
	<div class = "menu">
    <button class = "menulinks active" onclick = "action(event, 'Description')"> Description </button>
    <button class = "menulinks" onclick = "action(event, 'Trailers')"> Trailers </button>
    <button class = "menulinks" onclick = "action(event, 'Links')"> Links </button>
	<button style = "float:right"><i class = "fa fa-adjust"></i> Change Theme </button>
    </div>
		
	<div id = "Description" class = "modalcontent">
    <p style = "text-align:justify; font-size: 20px; color:black"><?php echo $ProductDescription; ?></p>
    </div>

    <div id="Trailers" class="modalcontent" style="display:none;">
	<?php echo $ProductTrailers; ?>
    </div>
    
	<div id="Performance" class="modalcontent" style="display:none;">
	<?php echo $ProductPerformance; ?>
    </div>
	
    <div id="Links" class="modalcontent" style="display:none;">
    <p style = "font-size: 20px; color:black"> <?php echo $ProductLinks; ?> </p> &nbsp;
    </div>

   </div>
   </div>
<?php } } } ?>
  </div>
 </div>
</div>

<div class = "footer" id = "footer-width"> 
<p>
<?php
    $copyright_result = mysqli_query($connDatabase, "SELECT * FROM `other_data` WHERE `ID` = 1");
    $checkCopyrightResult = mysqli_num_rows($copyright_result);
    if ($checkCopyrightResult > 0) {
	while (($rows = mysqli_fetch_assoc($copyright_result))) {
		$Copyright = $rows['Name'];
        echo $Copyright;
    }
    }
?>
</p> 
</div>

<script src = "../Main/Additional Files/Products.js"></script> <!-- Връзка с файла с Javascript и JQuery -->

</body>
</html>