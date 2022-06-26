<?php
	include 'php/connection.php';
	$date=$_POST['date'];
	$amount=$_POST['amount'];
	$user_id=$_POST['user_id'];
	$cat_id=$_POST['cat_id'];
	$sql = "INSERT INTO `expenses`( `user_id`, `date`, `amount`, `category_id`) 
	VALUES ('$user_id','$date','$amount','$cat_id')";
	
	

	if (mysqli_query($connection, $sql)) {
		$sql1= "SELECT * FROM `expenses` order by id DESC limit 1";
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