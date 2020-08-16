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


  /* ========================= Tags page Functions =================================*/
 

 /* Insert tags into the database */
if(isset($_POST["taginsertbtn"])){
    $tagname=$_POST['tagname'];
   

    $query = mysqli_query($conn,"SELECT * FROM ar_tags WHERE tag_name='$tagname'");
    $sql = "INSERT INTO ar_tags (tag_name) VALUES ('$tagname')";
 
    //Response
    //Checking to see if tag already exsist
    if(mysqli_num_rows($query) > 0) {
        echo "The name, " . $_POST['tagname'] . ", already exists.";
        
    }
    elseif(!mysqli_query($conn, $sql)) {
        echo "Could not insert";
    }
    else {
        echo  $_POST['tagname'] . " is added";
       
    }
 
    //Close connection
    mysqli_close($conn);
}

/* For deleting tags */
if(isset($_POST['tagdelbtn'])){
  if(isset($_POST['tagcheckbx'])){
    foreach($_POST['tagcheckbx'] as $deleteid){

      $deletetag = "DELETE from ar_tags WHERE tag_id=".$deleteid;
      mysqli_query($conn,$deletetag);
    }
    if(!mysqli_query($conn,$deletetag)){
        echo "Could not be deleted please try again";
    }
    else {
        echo "YES";
    }
  }
 
}

/* For updating tags */

if(isset($_POST['tag_update'])){
    $updatetagid = $_POST['tagid'];
    $updatetagname=$_POST['tagname'];


    $tag_update_dbsql = "UPDATE ar_tags SET tag_name='$updatetagname' WHERE tag_id=" . $updatetagid;

    if (mysqli_query($conn, $tag_update_dbsql)) {
    echo "Tag updated successfully";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


  /* ========================= End of Tags page Functions =================================*/


/* ========================= All Post page Functions =================================*/

/* For deleting categories */
if(isset($_POST['posdelbtn'])){
  if(isset($_POST['poscheckbx'])){
    foreach($_POST['poscheckbx'] as $deletepid){

      $deletepos = "DELETE from ar_posts WHERE post_id=".$deletepid;
      mysqli_query($conn,$deletepos);
    }
    if(!mysqli_query($conn,$deletepos)){
        echo "Could not be deleted please try again";
       
    }
    else {
        echo "YES";
    }
  }
 
}

//Single button del 
if(isset($_POST['singleposdel'])){

      $deletepos = "DELETE from ar_posts WHERE post_id=".$_POST['singleposdel'];
      mysqli_query($conn,$deletepos);

    if(!mysqli_query($conn,$deletepos)){
        echo "Could not be deleted please try again";
    }
    else {
        echo "YES";
    }

}















?>