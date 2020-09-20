<?php
/*
 * Core part of the application
 * This page used for adding core functions to the application
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


require_once("config.php");

//All Global Variables
$loginuser = $_SESSION["arlenUserTest"];

/* -- ============================================================== -->
    <!-- All General Functions -->
-- ============================================================== */

/* -------------------- For Generate Rando String  ---------------------*/
function arRandomString($length = 4)
{
    $ar_characters = '0123456789';
    $ar_charactersLength = strlen($ar_characters);
    $ar_randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $ar_randomString .= $ar_characters[rand(0, $ar_charactersLength - 1)];
    }
    return $ar_randomString;
}


/* -------------------------- For  Excerpt Word Limit --------------------*/
function arLimitExcerpt($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}


/* ------------------------------ User handle function ----------------- */
function arUserIdentifier($conn, $loginuser, $sel)
{ //fetching data for testing
    $queryuid = "SELECT ar_authorname, ar_avatar, ar_userid FROM ar_admin WHERE ar_username= '$loginuser' limit 1";
    $uidresult = mysqli_query($conn, $queryuid);
    $uidresult = mysqli_fetch_row($uidresult);
    if ($sel == 0) {
        echo $uidresult[0];
    } elseif ($sel == 1) {
        echo $uidresult[1];
    } elseif ($sel == 2) {
        return $uidresult[2];
    }
}

/* ----------------------------- All tags and count function --------------------- */
function arCountQuery($conn, $catstatus, $tagstatus){

    if($catstatus === "caton"){
        $querycont = mysqli_query($conn, "SELECT post_category FROM ar_posts");
        $catcontary = [];
        while($result = mysqli_fetch_array($querycont)){
        $catcontary[] = explode(",", $result['post_category']);
        }
        $GLOBALS['ccontary'] = $catcontary;
    }else if($tagstatus === "tagon"){
        $tagcont = mysqli_query($conn, "SELECT post_tags FROM ar_posts");
        $tagcontary = [];
        while($tresult = mysqli_fetch_array($tagcont)){
        $tagcontary[] = explode(",", $tresult['post_tags']);
        }
        $GLOBALS['tcontary'] = $tagcontary;
    }
    
}

function arCount($arrayin, $catnum){ // Count Calling function
    $artot = 0;
    foreach($arrayin as $cont){
        foreach ($cont as $c){
            if($c == $catnum){
                $artot += 1; 
            }
        }
    }

    echo $artot;
}

//
?>