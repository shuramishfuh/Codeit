<?php

const included = true;

require_once "php/inc/helpers.inc.php";
require_once "php/inc/setup_database.inc.php";
require_once "php/search/search.inc.php";
require_once "php/search/results_display.inc.php";

$query = $conn->escape_string($get['q']);

echo $query;
if(isset($_POST['search'])){
 $search = mysqli_real_escape_string($con,$_POST['search']);

 $query = "SELECT * FROM users WHERE name like'%".$search."%'";
 $result = mysqli_query($con,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("value"=>$row['id'],"label"=>$row['name']);
 }

 echo json_encode($response);
}

exit;