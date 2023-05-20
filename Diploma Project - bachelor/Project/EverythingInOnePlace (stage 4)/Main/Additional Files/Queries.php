<?php

require('Connection_To_Database.php');

$query0 = "SELECT `categories`.`ID` AS `category_id`,`categories`.`Name` AS `category_name` FROM `categories`";

// заявки за извличане на данни от таблиците в базата данни като се използват специални променливи
// от които се взимат ID-тата на категориите и подкатегориите, но първо се проверяват дали са валидирани
 
if (isset($_GET['categoryid']) && is_numeric($_GET['categoryid'])) {

$CategoryID = mysqli_real_escape_string($connDatabase, $_GET['categoryid']);
	
$query1 = "SELECT `header`.`Image_Directory` AS `header_image`, `header`.`Name` AS `header_name` FROM `categories`, `header` WHERE `header`.`ID` = `categories`.`Header_ID` AND `categories`.`ID` = '" . $CategoryID . "'";

$query2 = "SELECT `products`.`Image_Directory` AS `product_image`, `products`.`Name` AS `product_name` FROM `categories`, `products` 
WHERE `categories`.`ID` = `products`.`Category_ID` AND `products`.`Category_ID` = '" . $CategoryID . "'";

$query3 = "SELECT `product_information`.`Name` AS `product_details_name` FROM `categories`, `product_information` ,`product_information_per_category` WHERE 
`categories`.`ID` = `product_information_per_category`.`Category_ID` AND `product_information`.`ID` = `product_information_per_category`.`Product_Information_ID` AND `product_information_per_category`.`Category_ID` = '" . $CategoryID . "'";

$query4 = "SELECT `subcategories`.`ID` AS `subcategory_id`, `subcategories_of_categories`.`Subcategory_Name` AS `subcategory_name` FROM `categories`, `subcategories`, `subcategories_of_categories` WHERE 
`categories`.`ID` = `subcategories_of_categories`.`Category_ID` AND `subcategories`.`Name` = `subcategories_of_categories`.`Subcategory_Name` AND
`subcategories_of_categories`.`Category_ID` = '" . $CategoryID . "'";

}

if (isset($_GET['subcategoryid']) && is_numeric($_GET['subcategoryid'])) {
	
$SubcategoryID = mysqli_real_escape_string($connDatabase, $_GET['subcategoryid']);

$query5 = "SELECT `subcategories`.`Header_Name` AS `header_name` FROM `subcategories`, `header` WHERE `header`.`Name` = `subcategories`.`Header_Name` AND `subcategories`.`ID` = '" . $SubcategoryID . "'";

$query6 = "SELECT `products`.`Image_Directory` AS `product_image`, `products`.`Name` AS `product_name` FROM `subcategories`, `products`, `product_subcategory` 
WHERE `subcategories`.`ID` = `product_subcategory`.`Subcategory_ID` AND `products`.`ID` = `product_subcategory`.`Product_ID` 
AND `product_subcategory`.`Subcategory_ID` = '" . $SubcategoryID . "'";


$query7 = "SELECT `subcategories`.`ID` AS `subcategory_id`, `subcategories`.`Name` AS `subcategory_name` FROM `subcategories` GROUP BY `subcategories`.`ID`";

}

if ((isset($_GET['categoryid']) && is_numeric($_GET['categoryid']))) {
	
$CategoryID = mysqli_real_escape_string($connDatabase, $_GET['categoryid']);

$content_query = "SELECT `products`.`Name` AS `product_name`, `products`.`Header_Image` AS `product_header_image`, `products`.`Year` AS `product_year`, 
`products`.`Creator` AS `product_creator`, `products`.`IMDb Rating` AS `IMDb`, `products`.`Description` AS `product_description`, `products`.`Trailers` AS `product_trailers`, 
`products`.`Links` AS `product_links`, `products`.`Performance` AS `product_performance` FROM `categories`, `products` 
WHERE `categories`.`ID` = `products`.`Category_ID` AND `products`.`Category_ID` = '" . $CategoryID . "'";

}
?>