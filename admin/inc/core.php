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
    $queryuid = "SELECT ar_authorname, ar_avatar, ar_userid, ar_role FROM ar_admin WHERE ar_username= '$loginuser' limit 1";
    $uidresult = mysqli_query($conn, $queryuid);
    $uidresult = mysqli_fetch_row($uidresult);
    if ($sel == 0) {
        echo $uidresult[0];
    } elseif ($sel == 1) {
        echo $uidresult[1];
    } elseif ($sel == 2) {
        return $uidresult[2];
    } elseif($sel == 3){
        return $uidresult[3];
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

/* ----------------------------- For all counts in dashboard --------------------- */

function arhomePage($conn, $vpost, $vcat, $vtag){ 
    if($vpost == true){
        $query = "SELECT post_id FROM ar_posts"; 
        $result = mysqli_query($conn, $query); 
      
        if ($result) 
        { 
            $row = mysqli_num_rows($result); 
              
               if ($row) 
                  { 
                     echo $row; 
                  } 
            mysqli_free_result($result); 
        } 
    }elseif($vcat == true){
        $query = "SELECT cat_id FROM ar_categories"; 
        $result = mysqli_query($conn, $query); 
      
        if ($result) 
        { 
            $row = mysqli_num_rows($result); 
              
               if ($row) 
                  { 
                     echo $row; 
                  } 
            mysqli_free_result($result); 
        } 
    }elseif($vtag == true){
        $query = "SELECT tag_id FROM ar_tags"; 
        $result = mysqli_query($conn, $query); 
      
        if ($result) 
        { 
            $row = mysqli_num_rows($result); 
              
               if ($row) 
                  { 
                     echo $row; 
                  } 
            mysqli_free_result($result); 
        } 
    }
}

/* ----------------------------- For Settings retrive --------------------- */

function arSettings($conn){
    $dsettings = mysqli_query($conn, "SELECT dashboard, frontend, mail FROM ar_meta WHERE id=1");
    $final = mysqli_fetch_row($dsettings);
    return $final;
}
function arFn($input, $default){
    if($input == ""){
        echo $default;
    }else {
        echo $input;
    }
}

 //for all comman site settings


/* ----------------------------- URL Rewrite --------------------- */

/* function arUrlWrite($conn){

    $urlquery = mysqli_query($conn, "SELECT post_url FROM ar_posts");
    if(mysqli_num_rows($urlquery) > 0){
        $data = "#Blog management Generated code";
        $data .= "<IfModule mod_rewrite.c> \r\n \r\n RewriteEngine on \r\n";
        while($oneUrl = mysqli_fetch_assoc($urlquery)){ 

            $data .= "\r\n RewriteRule ^". $oneUrl["post_url"] ." example-post-single.php?post_url=$1 [QSA,L] \r\n"; 
        }
        $data .= "\r\n </IfModule>";

        return $data;

    }
    
}
function arUrlCall($conn){
   // $juma = arUrlWrite($conn);
    $filename = "../.htaccess";
    file_put_contents($filename, arUrlWrite($conn) , LOCK_EX);
}

arUrlCall($conn); */
//