<?php 

    $host = "174.138.19.197";
    $port = 5432;
    $database = "db213051048";
    $username = "u213051048";
    $password = "p213051048";
 
    $connection =  new PDO("pgsql:host=$host;port=$port;dbname=$database", $username, $password);

    if($connection){
        echo "terkoneksi";
    }else{
        echo "Tidak terkoneksi";
    }