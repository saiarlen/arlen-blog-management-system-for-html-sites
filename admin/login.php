<?php
/*
 * login functions
 * login functions
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

if (file_exists("config.php")){
    require_once("config.php");
}

function arlen_Auth(){
    session_start();

    if(isset($_SESSION["username"])) {
        header ("location: dashboard.php");
    }

}

?>
