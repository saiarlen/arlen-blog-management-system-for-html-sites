<?php 
/*
 * Core part of the application
 * This page used for adding core functions to the application
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


 require_once ("config.php");

 //All Global Variables
 $loginuser = $_SESSION["arlenUserTest"];

 /* -- ============================================================== -->
    <!-- All General Functions -->
-- ============================================================== */

/* -------------------- For Generate Rando String  ---------------------*/
 function arRandomString($length = 4) {
    $ar_characters = '0123456789';
    $ar_charactersLength = strlen($ar_characters);
    $ar_randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $ar_randomString .= $ar_characters[rand(0, $ar_charactersLength - 1)];
    }
    return $ar_randomString;
}


 /* -------------------------- For  Excerpt Word Limit --------------------*/
 function arLimitExcerpt($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}


/* ------------------------------ Adding new post submit handle function ----------------- */

function arAddNewPost($conn){
    //date_default_timezone_set('Asia/Kolkata');

 // Insert post into the database
if(isset($_POST["post_submit"])){
    $p_title = mysqli_real_escape_string($conn, $_POST['p-title']);

    if(!empty($_POST['p-cat'])){
        $p_cats = $_POST['p-cat'];
        $p_catarray = implode(', ', $p_cats);
    }else{
        $p_catarray = NULL;
    }
    if(!empty($_POST['p-tag'])){
        $p_tags = $_POST['p-tag'];
        $p_tagarray = implode(', ', $p_tags);
    }else{
        $p_tagarray = NULL;
    }

    $p_kws = mysqli_real_escape_string($conn, $_POST['p-keywords']);
    $p_des = mysqli_real_escape_string($conn, $_POST['p-des']);
    $p_date = $_POST['datepicker-autoclose'];
    $p_content = $_POST['editor1'];
    $p_img = $_POST['p-image'];
    $p_excerpt = mysqli_real_escape_string($conn, $_POST['p-exp']);
    $p_imalt = $_POST['img-alt'];

    //test the received values if empty
    if(empty($p_title)){
        $p_title = "Unnamed Post" . " " . arRandomString();
    }
    if($p_date == ""){
        $p_date = date("d-m-Y");
    }
    if(empty($p_content)){
        $p_content = "Need to add some content";
    }
    if(empty($p_excerpt)){
        $p_excerpt = "Please add some Excerpt to see content here.";
    }
    if(empty($p_imalt)){
        $p_imalt = "Blog Image";
    }

    //Date And Time Setup

    $pt_date = $p_date . " " . date("H:i:s");

    //Url Conversion
    $pa_url = strtolower($p_title);
    $p_url = preg_replace("/[^a-z0-9_\s-]/", "", $pa_url);
    $p_url = preg_replace("/[\s-]+/", " ", $p_url);
    $p_url = preg_replace("/[\s_]/", "-", $p_url);


    $psql = "INSERT INTO ar_posts (
        post_title, 
        post_url,
        post_category,
        post_tags,
        post_kws, 
        post_des, 
        post_date, 
        post_content, 
        post_img,
        post_exp,
        post_imgalt) 
        VALUES (
            '$p_title', 
            '$p_url',
            '$p_catarray',
            '$p_tagarray',
            '$p_kws',
            '$p_des',
            '$pt_date',
            '$p_content',
            '$p_img',
            '$p_excerpt',
            '$p_imalt')";
 
    if(!mysqli_query($conn, $psql)) {
        echo "Could not insert" . mysqli_error($conn);
    }
    else {
        echo  "<script>postResponse();</script>";
       
    }
 
    //Close connection
    mysqli_close($conn);
}
}

/* ------------------------------ Updating Post handle function ----------------- */

function arUpdatePost($conn){
      /* update post into the database */
      if(isset($_POST["post_submit"])){
        $p_title = mysqli_real_escape_string($conn, $_POST['p-title']);

        $post_uniq_id = $_POST['post-uniq-id'];

        if(!empty($_POST['p-cat'])){
            $p_cats = $_POST['p-cat'];
            $p_catarray = implode(', ', $p_cats);
        }else{
            $p_catarray = NULL;
        }
        if(!empty($_POST['p-tag'])){
            $p_tags = $_POST['p-tag'];
            $p_tagarray = implode(', ', $p_tags);
        }else{
            $p_tagarray = NULL;
        }

        $p_kws = mysqli_real_escape_string($conn, $_POST['p-keywords']);
        $p_des = mysqli_real_escape_string($conn, $_POST['p-des']);
        $p_date = $_POST['datepicker-autoclose'];
        $p_content = $_POST['editor1'];
        $p_img = $_POST['p-image'];
        $p_excerpt = mysqli_real_escape_string($conn, $_POST['p-exp']);
        $p_imalt = $_POST['img-alt'];

        //test the received values if empty
        if(empty($p_title)){
            $p_title = "Unnamed Post" . " " . arRandomString();
        }
        if($p_date == ""){
            $p_date = date("d-m-Y");
        }
        if(empty($p_content)){
            $p_content = "Need to add some content";
        }
        if(empty($p_excerpt)){
            $p_excerpt = "Please add some Excerpt to see content here.";
        }
        if(empty($p_imalt)){
            $p_imalt = "Blog Image";
        }

        //Date And Time Setup

        $pt_date = $p_date . " " . date("H:i:s");



        //Url Conversion
        $pa_url = strtolower($p_title);
        $p_url = preg_replace("/[^a-z0-9_\s-]/", "", $pa_url);
        $p_url = preg_replace("/[\s-]+/", " ", $p_url);
        $p_url = preg_replace("/[\s_]/", "-", $p_url);


        $psql = "UPDATE ar_posts SET 
            post_title = '$p_title', 
            post_url = '$p_url',
            post_category = '$p_catarray',
            post_tags = '$p_tagarray',
            post_kws = '$p_kws', 
            post_des = '$p_des', 
            post_date = '$pt_date', 
            post_content = '$p_content', 
            post_img = '$p_img',
            post_exp = '$p_excerpt',
            post_imgalt = '$p_imalt' WHERE post_id=" . $post_uniq_id;
        
    
        if(!mysqli_query($conn, $psql)) {
            echo "<script>";
            echo "alert(Could not insert" . mysqli_error($conn) . ");location.href = 'all-posts.php';";
            echo "</script>";

        }
        else {
            return $response_msg = TRUE;
        }
    
        
    }
}

/* ------------------------------ User handle function ----------------- */
function arUserIdentifier($conn, $loginuser, $sel){
    $queryuid = "SELECT ar_authorname, ar_avatar FROM ar_admin WHERE ar_username= '$loginuser' limit 1";
    $uidresult = mysqli_query($conn, $queryuid);
    $uidresult = mysqli_fetch_row($uidresult);
    if($sel == 0){
        echo $uidresult[0];
    }elseif($sel == 1){
        echo $uidresult[1];
    }
    
   
}

function arUserDataFetch($conn, $loginuser){
    $user_update_sql = "SELECT * FROM ar_admin WHERE ar_username= '$loginuser' limit 1";
    $userupdate_result = mysqli_query($conn, $user_update_sql);

    if (mysqli_num_rows($userupdate_result) > 0 && mysqli_num_rows($userupdate_result) <= 1) {

        return mysqli_fetch_assoc($userupdate_result);
        //echo "saiarlennn";

    } else {
        echo "<script>alert('Somethng Wrong! Please try Again.');location.href = 'add-new-profile.php';</script>";
    }
   

}





?>