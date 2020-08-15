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
session_start();
$conn = db_Connect($host, $user, $pass, $database);

//Base URL
define("ARLEN_BASE_URL", "http://localhost/blog");

//Season Time Setip
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();    
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
$page_scripts = TRUE; //Defult Value for page scripts