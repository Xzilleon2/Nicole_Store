<?php 

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'nicoledb';

    $conn = new mysqli($servername, $username, $password,$databasename);

    if($conn -> connect_error){
        die("DB connection Failed". $conn->connect_error);
    }
?>