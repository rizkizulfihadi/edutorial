<?php
session_start();

if( !$_SESSION["login"] ){
    header("Location:login.php");
    exit;
}


$username = $_SESSION["username"];

$statement = $connection->query("SELECT * FROM admin WHERE username = '$username'");
$user = $statement->fetch() ;

