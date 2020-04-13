<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "blogdata";

function db_Connect($host, $user, $pass, $db) {
    $mysqli = new mysqli($host, $user, $pass, $db);

    if($mysqli->connect_error){
        die('Connect Error (' . mysqli_connect_errno() .')' . mysqli_connect_error() );
    }
    
    return $mysqli;

}

$conn = db_Connect($host, $user, $pass, $database);

?>