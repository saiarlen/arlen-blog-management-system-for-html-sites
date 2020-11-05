<?php 
/*
 * Post handle script
 * This page used for Post handle
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */
 require_once ("config.php");

// ============================================================== 
// Adding new post submit handle function
// ============================================================== 
function arAddNewPost($conn){
    //date_default_timezone_set('Asia/Kolkata');

    // Insert post into the database
    if (isset($_POST["post_submit"])) {
        $p_title = mysqli_real_escape_string($conn, trim($_POST['p-title']));

        if (!empty($_POST['p-cat'])) {
            $p_cats = $_POST['p-cat'];
            $p_catarray = implode(', ', $p_cats);
        } else {
            $p_catarray = NULL;
        }
        if (!empty($_POST['p-tag'])) {
            $p_tags = $_POST['p-tag'];
            $p_tagarray = implode(', ', $p_tags);
        } else {
            $p_tagarray = NULL;
        }

        $p_kws = mysqli_real_escape_string($conn, trim($_POST['p-keywords']));
        $p_des = mysqli_real_escape_string($conn, trim($_POST['p-des']));
        $p_date = mysqli_real_escape_string($conn, trim($_POST['datepicker-autoclose']));
        $p_content = $_POST['editor1'];
        $p_img = mysqli_real_escape_string($conn, $_POST['p-image']);
        $p_excerpt = mysqli_real_escape_string($conn, trim($_POST['p-exp']));
        $p_imalt = mysqli_real_escape_string($conn, trim($_POST['img-alt']));

        //test the received values if empty
        if (empty($p_title)) {
            $p_title = "Unnamed Post" . " " . arRandomString();
        }
        if ($p_date == "") {
            $p_date = date("d-m-Y");
        }
        if (empty($p_content)) {
            $p_content = "Need to add some content";
        }
        if (empty($p_excerpt)) {
            $p_excerpt = "Please add some Excerpt to see content here.";
        }
        if (empty($p_imalt)) {
            $p_imalt = "Blog Image";
        }

        //Date And Time Setup

        $pt_date = $p_date . " " . date("H:i:s");

        //Url Conversion
        $pa_url = strtolower($p_title);
        $p_url = preg_replace("/[^a-z0-9_\s-]/", "", $pa_url);
        $p_url = preg_replace("/[\s-]+/", " ", $p_url);
        $p_url = preg_replace("/[\s_]/", "-", $p_url);

        $p_author = $_POST["pauthor"];


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
        post_imgalt,
        post_author) 
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
            '$p_imalt',
            '$p_author')";

        if (!mysqli_query($conn, $psql)) {
            echo  '<script>arSubmitResponse("error", "Something went wrong! Please try again.")</script>';
        } else {
            echo  '<script>arPostResponse(); arSubmitResponse("success", "Post Saved Successfully")</script>';
        }

        //Close connection
        mysqli_close($conn);
    }
}

// ============================================================== 
// Update post submit handle function
// ============================================================== 
function arUpdatePost($conn){
    /* update post into the database */
    if (isset($_POST["post_submit"])) {
        $p_title = mysqli_real_escape_string($conn, trim($_POST['p-title']));

        $post_uniq_id = $_POST['post-uniq-id'];

        if (!empty($_POST['p-cat'])) {
            $p_cats = $_POST['p-cat'];
            $p_catarray = implode(', ', $p_cats);
        } else {
            $p_catarray = NULL;
        }
        if (!empty($_POST['p-tag'])) {
            $p_tags = $_POST['p-tag'];
            $p_tagarray = implode(', ', $p_tags);
        } else {
            $p_tagarray = NULL;
        }

        $p_kws = mysqli_real_escape_string($conn, trim($_POST['p-keywords']));
        $p_des = mysqli_real_escape_string($conn, trim($_POST['p-des']));
        $p_date = mysqli_real_escape_string($conn, trim($_POST['datepicker-autoclose']));
        $p_content = $_POST['editor1'];
        $p_img = mysqli_real_escape_string($conn, $_POST['p-image']);
        $p_excerpt = mysqli_real_escape_string($conn, trim($_POST['p-exp']));
        $p_imalt = mysqli_real_escape_string($conn, trim($_POST['img-alt']));

        //test the received values if empty
        if (empty($p_title)) {
            $p_title = "Unnamed Post" . " " . arRandomString();
        }
        if ($p_date == "") {
            $p_date = date("d-m-Y");
        }
        if (empty($p_content)) {
            $p_content = "Need to add some content";
        }
        if (empty($p_excerpt)) {
            $p_excerpt = "Please add some Excerpt to see content here.";
        }
        if (empty($p_imalt)) {
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


        if (!mysqli_query($conn, $psql)) {
           
            return $response_msg = "error";
        } else {
            return $response_msg = "success";
        }
    }
}

?>