<?php
	include 'php/connection.php';
	$name=$_POST['name'];
	$user_id=$_POST['user_id'];
	$sql = "INSERT INTO `categories`( `name`, `user_id`) 
	VALUES ('$name','$user_id')";
	
	

	if (mysqli_query($connection, $sql)) {
		
		$sql1= "SELECT * FROM `categories` order by id DESC limit 1";
		$stmt1 = $connection->prepare($sql1);
		$stmt1->execute();
		$result = $stmt1->get_result();
		$row = $result->fetch_assoc();
		echo json_encode(array("statusCode"=>200,"id"=>$row['id']));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($connection);
?>