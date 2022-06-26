<?php 
include "php/connection.php";

//$article_id = $_GET["id"];
$id=$_POST['id'];
$date=$_POST['date'];
$amount=$_POST['amount'];
$user_id=$_POST['user_id'];
$cat_id=$_POST['cat_id'];


$sql = "UPDATE expenses SET user_id = '$user_id', date = '$date', amount = '$amount', category_id = '$cat_id' where id='$id'";
	if (mysqli_query($connection, $sql)) {
		
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($connection);

?>