<?php
/*
 * Database connection
 * This page used for database connection
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

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

