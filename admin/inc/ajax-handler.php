<?php 
/*
 * Ajax Form Part part of the application
 * This page used for Ajax Form functions to the application
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


 require_once ("config.php");

 /* ========================= Category page Functions =================================*/
 

 /* Insert categories into the database */
if(isset($_POST["catinsertbtn"])){
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

/* For deleting categories */
if(isset($_POST['catdelbtn'])){
  if(isset($_POST['catcheckbx'])){
    foreach($_POST['catcheckbx'] as $deleteid){

      $deleteCat = "DELETE from ar_categories WHERE id=".$deleteid;
      mysqli_query($conn,$deleteCat);
    }
    if(!mysqli_query($conn,$deleteCat)){
        echo "Could not be deleted please try again";
    }
    else {
        echo "YES";
    }
  }
 
}

/* For updating categories */

if(isset($_POST['cat_update'])){
    $updatecatid = $_POST['catid'];
    $updatecatname=$_POST['catname'];
    $updatecatslgname=$_POST['catslgname'];

    $catslgnameupdate = strtolower($updatecatslgname);
    $final_update_catslgname = preg_replace('#[ -]+#', '-', $catslgnameupdate);
    $final_update_catslgname = urlencode($final_update_catslgname);

    $cat_update_dbsql = "UPDATE ar_categories SET cat_name='$updatecatname', cat_slug='$final_update_catslgname' WHERE id=" . $updatecatid;

    if (mysqli_query($conn, $cat_update_dbsql)) {
    echo "Category updated successfully";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


  /* ========================= End of Category page Functions =================================*/



















?>