<?php
include "php/connection.php";

$id = $_GET["id"];
$query = "SELECT C.name AS x,sum(E.amount) AS value from categories as C, expenses AS E WHERE C.id=E.category_id And E.user_id= ? GROUP by category_id";
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
