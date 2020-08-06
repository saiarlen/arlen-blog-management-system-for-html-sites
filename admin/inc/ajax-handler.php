<?php 
/*
 * Ajax Form Part part of the application
 * This page used for Ajax Form functions to the application
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


 require_once ("config.php");

 /* Category page Functions */
if(isset($_POST["catname"])){
    $catname=$_POST['catname'];
    $catslgname=$_POST['catslgname'];
    if($catslgname == " "){
        $catslgname = $catname;
    }
    $catslgname = strtolower($catslgname);
    $final_catslgname = preg_replace('#[ -]+#', '-', $catslgname);
    $final_catslgname = urlencode($final_catslgname);

    $query = mysqli_query($conn,"SELECT * FROM ar_categories WHERE cat_name='$catname' OR cat_slug='$final_catslgname'");
    $sql = "INSERT INTO ar_categories (cat_name, cat_slug) VALUES ('$catname', '$final_catslgname')";
 
    //Response
    //Checking to see if cat already exsist
    if(mysqli_num_rows($query) > 0) {
        echo "The name, " . $_POST['catname'] . ", or Slug, " . $_POST['catslgname'] . ", already exists.";
        
    }
    elseif(!mysqli_query($conn, $sql)) {
        echo "Could not insert";
    }
    else {
        echo  $_POST['catname'] . " is added";
    }
 
    //Close connection
    mysqli_close($conn);
}

 


















?>