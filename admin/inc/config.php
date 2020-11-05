<?php
/*
 * Database connection
 * This page used for database connection
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$host = "localhost";
$user = "root";
$pass = "";
$database = "blogdata";
//Base URL
define("ARLEN_BASE_URL", "http://localhost/blog");


//Main Connection
function db_Connect($host, $user, $pass, $db){
    $mysqli = mysqli_connect($host, $user, $pass, $db);
    if (mysqli_connect_errno()) {
        die('Connect Error' . mysqli_connect_error());
    }
    return $mysqli;
}
session_start();
$conn = db_Connect($host, $user, $pass, $database);

//Season Time Setup
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

//error_reporting(E_ALL); //error reporting
//ini_set('display_errors', '1');

//blog single page switch for active and deactivate methods
//define("AR_SNP_SWITCH", false);