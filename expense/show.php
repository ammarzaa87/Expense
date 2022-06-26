<?php
include "php/connection.php";
$id = $_GET["id"];

$query = "SELECT S.id, S.amount,S.date,C.name  FROM expenses As S, categories AS C WHERE S.category_id=C.id AND S.user_id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
while($row = $result->fetch_assoc()){
    $temp_array[] = $row;

}

//print_r($temp_array);


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;
