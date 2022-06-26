<?php
require_once 'php/connection.php';
$id=$_POST['id'];
$query="delete from expenses where id=$id";
mysqli_query($connection, $query);

?>

