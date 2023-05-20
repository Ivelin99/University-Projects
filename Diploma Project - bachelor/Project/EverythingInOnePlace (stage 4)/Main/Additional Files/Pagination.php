<?php
require('Connection_To_Database.php');

   //var_dump($result);

$limit = '6';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
	
$query = "SELECT `products`.`Image_Directory`, `products`.`Name` FROM `products`";

if($_POST['query'] != '')
{
  $query .= ' 
  ,`categories` WHERE `categories`.`ID` = `products`.`Category_ID` AND `products`.`Name` LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';	 
}

//`subcategories`, `product_subcategory`
//AND `subcategories`.`ID` = `product_subcategory`.`Subcategory_ID` AND 
//`products`.`ID` = `product_subcategory`.`Product_ID`	
	 
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$res = mysqli_query($connDatabase, $query);
$total_data = mysqli_num_rows($res);

$res = mysqli_query($connDatabase, $filter_query);
$result = mysqli_fetch_all($res);
$total_filter_data = mysqli_num_rows($res);

$output = '
<label>Total Records: '.$total_data.'</label><br>
';
if($total_data > 0)
{
  foreach($result as $row)
  {
	$output .= '
    <button class = "openBtn"><img src = "'.$row[0].'"/><p>'.$row[1].'</p></button>
	';
  }
}
else
{
  $output .= '
    <h1 style = "text-align:center">No Data Found</h1>
  ';
}

$output .= '
<br><br>
<div align="center">
  <ul class="pagination" style="font-size:18px">
';

$total_links = ceil($total_data/$limit);
$left_triangle = '';
$previous_link = '';
$page_link = '';
$next_link = '';
$right_triangle = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

if(!$total_data == 0) {
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
	  $left_triangle = '<a style="position:absolute;" class="page-link" id="left-triangle" href="javascript:void(0)" data-page_number="'.$previous_id.'"></a>';
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
	  $left_triangle = '
	  <a style = "display:none">
	  </a>
	  ';
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
	  $right_triangle = '
	  <a style="display:none">
	  </a>
	  ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
	  $right_triangle = '<a style="position:absolute;" class="page-link" id="right-triangle" href="javascript:void(0) "data-page_number="'.$next_id.'"></a>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}
}

$output .= $left_triangle . $previous_link . $page_link . $next_link . $right_triangle;
$output .= '
  </ul>

</div>
';

echo $output;

?>