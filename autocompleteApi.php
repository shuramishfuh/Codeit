<?php

$host="localhost";
$username="root";
$password="";
$databasename="searchdb";

$conn=mysqli_connect($host,$username,$password,$databasename);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$search = $_POST['search'];
	$q = "SELECT page_title FROM pages where page_title like '%".$search."%' LIMIT 5";
	$result =mysqli_query($conn,$q);
	if (mysqli_num_rows($result)) {
	     while($row=mysqli_fetch_assoc($result)){
		 echo '<a href ="#" class = "list-group list-group-item-action border p-2">'
					.$row['page_title'].'<a/> ';
		 }
	}
	else {
	           echo '<p class= "list-group list-group-item"> record not found <p/>';
          }


     }



?>