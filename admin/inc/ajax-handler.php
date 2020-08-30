<?php 
/*
 * Ajax Form Part part of the application
 * This page used for Ajax Form handle to the application
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


 require_once ("config.php");

 /* ========================= Login handle =================================*/
 if(isset($_POST["arlogsub"])){
  if(empty($_POST["arusername"]) || empty($_POST["arpass"])){
      echo "Something Went Wrong! Some fields are empty";
  }else{
      $ar_user = $conn-> real_escape_string($_POST['arusername']);
      $ar_pass = $conn-> real_escape_string($_POST['arpass']);
      $ar_pass = md5($ar_pass);
      $arlen_sql = "SELECT * FROM ar_admin WHERE ar_username = '$ar_user' AND ar_password = '$ar_pass'";
      $final = $conn-> query($arlen_sql);
      if(mysqli_num_rows($final) > 0){
          $_SESSION["arlenUserTest"] = $ar_user;
          //header ("location:" . ARLEN_BASE_URL ."/admin/home.php");
          echo "true";
      }else {
          echo "You entered an incorrect username or password";
      }
  }
}


 /* ========================= Category page handle =================================*/
 

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

      $deleteCat = "DELETE from ar_categories WHERE cat_id=".$deleteid;
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

    $cat_update_dbsql = "UPDATE ar_categories SET cat_name='$updatecatname', cat_slug='$final_update_catslgname' WHERE cat_id=" . $updatecatid;

    if (mysqli_query($conn, $cat_update_dbsql)) {
    echo "Category updated successfully";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


  /* ========================= End of Category page handle =================================*/


  /* ========================= Tags page handle =================================*/
 

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


  /* ========================= End of Tags page handle =================================*/


/* ========================= All Post page handle =================================*/

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

/* ========================= End of All Post page handle =================================*/


/* ========================= New Profile page handle =================================*/

if(isset($_POST["arnpfsub"])){
   
    $arnpfname=$_POST['arnpfname'];
    $arnpfuser=$_POST['arnpfuser'];
    $arnpfemail=$_POST['arnpfemail'];
    $arnpfcomp=$_POST['arnpfcomp'];
    $arnpfimg=$_POST['arnpfimg'];
    $arnpfpass=$_POST['arnpfpass'];
    $arnpfrole=$_POST['arnpfrole'];
    

    if (empty($arnpfname) || empty($arnpfuser) || empty($arnpfemail) || empty($arnpfpass) || empty($arnpfrole) ) {
       echo json_encode(array("alert", "Error some fields are empty!"));
        
    }else {
        if (empty($arnpfimg)) {
            $arnpfimg = ARLEN_BASE_URL . "/admin/deps/img/no-photo.jpg";
        }

        $arnpfpass = md5($arnpfpass);

        $npfquery = mysqli_query($conn,"SELECT * FROM ar_admin WHERE ar_username='$arnpfuser'");
        $npfsql = "INSERT INTO ar_admin (
            ar_username, 
            ar_authemail,
            ar_password,
            ar_authorname,
            ar_company,
            ar_avatar,
            ar_role) VALUES (
                '$arnpfuser', 
                '$arnpfemail',
                '$arnpfpass',
                '$arnpfname', 
                '$arnpfcomp',
                '$arnpfimg',
                '$arnpfrole')";
     
        //Checking to see if user already exsist
        if(mysqli_num_rows($npfquery) > 0) {

            echo json_encode(array("alert", "Username already taken!"));
            
        }
        elseif(!mysqli_query($conn, $npfsql)) {
            echo json_encode(array("error", "Something went wrong!"));
        }
        else {
            echo json_encode(array("success", "New author successfully created!"));
        } 
        //Close connection
        mysqli_close($conn);
    }

   
}
/* =========================End of New Profile page handle =================================*/


/* ========================= Update Profile page handle =================================*/

if(isset($_POST["arupfsub"])){
   
    $arupfid=$_POST['arupfid'];
    $arupfname=$_POST['arupfname'];
    $arupfemail=$_POST['arupfemail'];
    $arupfcomp=$_POST['arupfcomp'];
    $arupfimg=$_POST['arupfimg'];
   

    if (empty($arupfname) || empty($arupfemail)) {
       echo json_encode(array("alert", "Error some fields are empty!"));
        
    }else {
        if (empty($arupfimg)) {
            $arupfimg = ARLEN_BASE_URL . "/admin/deps/img/no-photo.jpg";
        }

       
        $upfsql = "UPDATE ar_admin SET ar_authemail='$arupfemail', ar_authorname='$arupfname', ar_company ='$arupfcomp', ar_avatar='$arupfimg' WHERE ar_userid=" . $arupfid;
      
        if(!mysqli_query($conn, $upfsql)) {
            echo json_encode(array("error", "Something went wrong!"));
        }
        else {
            echo json_encode(array("success", "Profile successfully Updated!"));
        } 
        //Close connection
        mysqli_close($conn);
    }
}

//change Pass
if(isset($_POST["aruppsub"])){
   
    $aruppid=$_POST['aruppid'];
    $aruppcnt=$_POST['aruppcnt'];
    $aruppnew=$_POST['aruppnew'];
    
    if (empty($aruppnew)) {
       echo json_encode(array("alert", "Error some fields are empty!"));
        
    }else {
        //$uppquery = "SELECT "
        $aruppcnt = md5($aruppcnt);
        $aruppnew = md5($aruppnew);
        $uppquery = "SELECT ar_password FROM ar_admin WHERE ar_userid=" . $aruppid . " AND ar_password='$aruppcnt'";
        $uppresult = mysqli_query($conn, $uppquery);

        if(mysqli_num_rows($uppresult) > 0){
            $uppsql = "UPDATE ar_admin SET ar_password='$aruppnew' WHERE ar_userid=" . $aruppid;
      
            if(!mysqli_query($conn, $uppsql)) {
                echo json_encode(array("error", "Something went wrong!"));
            }
            else {
                echo json_encode(array("success", "Password successfully Updated!"));
            } 

        }else {
            echo json_encode(array("alert", "Old password doesn't match!"));
        }

        
        //Close connection
        mysqli_close($conn);
    }
}
/* =========================End of Update Profile page handle =================================*/






?>