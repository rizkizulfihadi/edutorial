<?php
 

 function getConnection(): PDO
 {
     $host = "localhost";
     $port = 5432;
     $database = "edutorial";
     $username = "postgres";
     $password = "x1wavuna";
 
     return new PDO("pgsql:host=$host;port=$port;dbname=$database", $username, $password);
 }