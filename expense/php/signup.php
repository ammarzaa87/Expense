<?php
include "connection.php";

if(isset($_POST["email"]) && $_POST["email"] != "" ) {
    $email = $_POST["email"];
}else{
    die ("Enter a valid input");
}


if(isset($_POST["password"]) && $_POST["password"] != "" ) {
    $password = $_POST["password"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["confirmPassword"]) && $_POST["confirmPassword"] != "" ) {
    $confirmPassword = $_POST["confirmPassword"];
}else{
    die ("Enter a valid input");
}




$sql1="Select * from users where email=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
$sql2 = "INSERT INTO `users` (`email`, `password`) VALUES (?, ?);"; #add the new user to the database
$hash = hash('sha256', $password);
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ss",$email,$hash);
$stmt2->execute();
$result2 = $stmt2->get_result();

header('location: ../index.php');

}
else{
    session_start();
    $_SESSION["flash"] = "This email is taken, please register with new one";
    header('location: ../signup.php');
}
?>