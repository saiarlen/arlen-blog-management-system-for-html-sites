<?php
/*
 * Ajax Form Part part of the application
 * This page used for Ajax Form handle to the application
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

require_once("config.php");

// ============================================================== 
// Login handle
// ============================================================== 
if (isset($_POST["arlogsub"])) {
    if (empty($_POST["arusername"]) || empty($_POST["arpass"])) {
        echo "Something Went Wrong! Some fields are empty";
    } else {
        $ar_user = mysqli_real_escape_string($conn, trim($_POST['arusername']));
        $ar_pass = mysqli_real_escape_string($conn, trim($_POST['arpass']));
        $ar_pass = md5($ar_pass);
        $arlen_sql = "SELECT * FROM ar_admin WHERE ar_username = '$ar_user' AND ar_password = '$ar_pass'";
        $final = mysqli_query($conn, $arlen_sql);
        if (mysqli_num_rows($final) > 0) {
            $_SESSION["arlenUserTest"] = $ar_user;
            //header ("location:" . ARLEN_BASE_URL ."/admin/home.php");
            echo "true";
        } else {
            echo "You entered an incorrect username or password";
        }
    }
}
// ============================================================== 
// End of Login handle
// ============================================================== 

// ============================================================== 
// All Post page Delete handle
// ============================================================== 

if (isset($_POST['posdelbtn'])) { //For deleting categories
    if (isset($_POST['poscheckbx'])) {
        foreach ($_POST['poscheckbx'] as $deletepid) {

            $deletepos = "DELETE from ar_posts WHERE post_id=" . $deletepid;
            mysqli_query($conn, $deletepos);
        }
        if (!mysqli_query($conn, $deletepos)) {
            echo json_encode(array("error", "Something went wrong! Please try again."));
        } else {
            echo "YES";
        }
    }
}

if (isset($_POST['singleposdel'])) { //Single button del

    $deletepos = "DELETE from ar_posts WHERE post_id=" . $_POST['singleposdel'];
    mysqli_query($conn, $deletepos);

    if (!mysqli_query($conn, $deletepos)) {
        echo json_encode(array("error", "Something went wrong! Please try again."));
    } else {
        echo "YES";
    }
}
// ============================================================== 
// End of All Post page Delete handle
// ==============================================================

// ============================================================== 
// Category page handle
// ==============================================================

if (isset($_POST["catinsertbtn"])) { //Insert categories into the database
    $catname = mysqli_real_escape_string($conn, trim($_POST['catname']));
    $catslgname = mysqli_real_escape_string($conn, trim($_POST['catslgname']));
    if ($catslgname == " ") {
        $catslgname = $catname;
    }
    $catslgname = strtolower($catslgname);
    $final_catslgname = preg_replace('#[ -]+#', '-', $catslgname);
    $final_catslgname = urlencode($final_catslgname);

    $catquery = mysqli_query($conn, "SELECT * FROM ar_categories WHERE cat_name='$catname' OR cat_slug='$final_catslgname'");
    $catsql = "INSERT INTO ar_categories (cat_name, cat_slug) VALUES ('$catname', '$final_catslgname')";

    //Response
    //Checking to see if cat already exsist
    if (mysqli_num_rows($catquery) > 0) {
        echo json_encode(array("alert", "The Name: " . $_POST['catname'] . ", or Slug: " . $_POST['catslgname'] . ", already exists."));
    } elseif (!mysqli_query($conn, $catsql)) {
        echo json_encode(array("error", "Something went wrong! Please try again."));
    } else {
        echo json_encode(array("success", "New category successfully added!", "true"));
    }
    //Close connection
    mysqli_close($conn);
}

if (isset($_POST['catdelbtn'])) { // For deleting categories
    if (isset($_POST['catcheckbx'])) {
        foreach ($_POST['catcheckbx'] as $deleteid) {

            $deleteCat = "DELETE from ar_categories WHERE cat_id=" . $deleteid;
            mysqli_query($conn, $deleteCat);
        }
        if (!mysqli_query($conn, $deleteCat)) {
            echo json_encode(array("error", "Could not be deleted please try again."));
        } else {
            echo "YES";
        }
    }
}

if (isset($_POST['cat_update'])) { //For updating categories
    $upcatid = $_POST['catid'];
    $upcatname = mysqli_real_escape_string($conn, trim($_POST['catname']));
    $upcatslgname = mysqli_real_escape_string($conn, trim($_POST['catslgname']));

    $catslgnameupdate = strtolower($upcatslgname);
    $fup_catslgname = preg_replace('#[ -]+#', '-', $catslgnameupdate);
    $fup_catslgname = urlencode($fup_catslgname);

    $catup_query = mysqli_query($conn, "SELECT * FROM ar_categories WHERE cat_name='$upcatname' OR cat_slug='$fup_catslgname'");
    $cat_update_dbsql = "UPDATE ar_categories SET cat_name='$upcatname', cat_slug='$fup_catslgname' WHERE cat_id=" . $upcatid;

    if (mysqli_num_rows($catup_query) > 0) {
        echo json_encode(array("alert", "The Name: " . $_POST['catname'] . ", or Slug: " . $_POST['catslgname'] . ", already exists."));
    } else if (!mysqli_query($conn, $cat_update_dbsql)) {
        echo json_encode(array("error", "Something went wrong! Please try again."));
    } else {
        echo json_encode(array("success", "category successfully Updated!"));
    }

    mysqli_close($conn);
}
// ============================================================== 
// End of Category page handle
// ==============================================================

// ============================================================== 
// Tags page handle
// ==============================================================

if (isset($_POST["taginsertbtn"])) { //Insert tags into the database
    $tagname = mysqli_real_escape_string($conn, trim($_POST['tagname']));

    $query = mysqli_query($conn, "SELECT * FROM ar_tags WHERE tag_name='$tagname'");
    $sql = "INSERT INTO ar_tags (tag_name) VALUES ('$tagname')";

    //Response
    //Checking to see if tag already exsist
    if (mysqli_num_rows($query) > 0) {
        echo json_encode(array("alert", "The Name: " . $_POST['tagname'] . ", already exists."));
    } elseif (!mysqli_query($conn, $sql)) {
        echo json_encode(array("error", "Something went wrong! Please try again."));
    } else {
        echo json_encode(array("success", "New tag successfully added!", "true"));
    }
    //Close connection
    mysqli_close($conn);
}


if (isset($_POST['tagdelbtn'])) { // For deleting tags
    if (isset($_POST['tagcheckbx'])) {
        foreach ($_POST['tagcheckbx'] as $deleteid) {

            $deletetag = "DELETE from ar_tags WHERE tag_id=" . $deleteid;
            mysqli_query($conn, $deletetag);
        }
        if (!mysqli_query($conn, $deletetag)) {
            echo json_encode(array("error", "Could not be deleted please try again."));
        } else {
            echo "YES";
        }
    }
}

if (isset($_POST['tag_update'])) { //For updating tags
    $updatetagid = $_POST['tagid'];
    $updatetagname = mysqli_real_escape_string($conn, trim($_POST['tagname']));

    $tupquery = mysqli_query($conn, "SELECT * FROM ar_tags WHERE tag_name='$updatetagname' AND tag_id !=" . $updatetagid);
    $tag_update_dbsql = "UPDATE ar_tags SET tag_name='$updatetagname' WHERE tag_id=" . $updatetagid;

    if (mysqli_num_rows($tupquery) > 0) {
        echo json_encode(array("alert", "The Name: " . $_POST['tagname'] . ", already exists."));
    } else if (!mysqli_query($conn, $tag_update_dbsql)) {
        echo json_encode(array("error", "Something went wrong! Please try again."));
    } else {
        echo json_encode(array("success", "Tag successfully Updated!"));
    }
    mysqli_close($conn);
}
// ============================================================== 
// End of Tags page handle
// ==============================================================

// ============================================================== 
// New Profile page handle
// ==============================================================

if (isset($_POST["arnpfsub"])) {

    $arnpfname = mysqli_real_escape_string($conn, trim($_POST['arnpfname']));
    $arnpfuser = mysqli_real_escape_string($conn, trim($_POST['arnpfuser']));
    $arnpfemail = mysqli_real_escape_string($conn, trim($_POST['arnpfemail']));
    $arnpfcomp = mysqli_real_escape_string($conn, trim($_POST['arnpfcomp']));
    $arnpfimg = mysqli_real_escape_string($conn, $_POST['arnpfimg']);
    $arnpfpass = mysqli_real_escape_string($conn, trim($_POST['arnpfpass']));
    $arnpfrole = $_POST['arnpfrole'];


    if (empty($arnpfname) || empty($arnpfuser) || empty($arnpfemail) || empty($arnpfpass) || empty($arnpfrole)) {
        echo json_encode(array("alert", "Error some fields are empty!"));
    } else {
        if (empty($arnpfimg)) {
            $arnpfimg = ARLEN_BASE_URL . "/admin/deps/img/no-photo.jpg";
        }

        $arnpfpass = md5($arnpfpass);

        $npfquery = mysqli_query($conn, "SELECT * FROM ar_admin WHERE ar_username='$arnpfuser'");
        $npfemquery = mysqli_query($conn, "SELECT * FROM ar_admin WHERE ar_authemail='$arnpfemail'");
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
        if (mysqli_num_rows($npfquery) > 0) {

            echo json_encode(array("alert", "Username already taken!"));
        } elseif (mysqli_num_rows($npfemquery) > 0) {
            echo json_encode(array("alert", "This email is already registered, please choose another one."));
        } elseif (!mysqli_query($conn, $npfsql)) {
            echo json_encode(array("error", "Something went wrong!"));
        } else {
            echo json_encode(array("success", "New author successfully created!"));
        }
        //Close connection
        mysqli_close($conn);
    }
}
// ============================================================== 
// End of New Profile page handle
// ==============================================================

// ============================================================== 
// Update Current Profile and Single User Profile page handle
// ==============================================================

if (isset($_POST["arupfsub"])) {

    $arupfid = $_POST['arupfid'];
    $arupfname = mysqli_real_escape_string($conn, trim($_POST['arupfname']));
    $arupfemail = mysqli_real_escape_string($conn, trim($_POST['arupfemail']));
    $arupfcomp = mysqli_real_escape_string($conn, trim($_POST['arupfcomp']));
    $arupfimg = mysqli_real_escape_string($conn, $_POST['arupfimg']);


    if (empty($arupfname) || empty($arupfemail)) {
        echo json_encode(array("alert", "Error some fields are empty!"));
    } else {
        if (empty($arupfimg)) {
            $arupfimg = ARLEN_BASE_URL . "/admin/deps/img/no-photo.jpg";
        }

        $upemquery = mysqli_query($conn, "SELECT * FROM ar_admin WHERE ar_authemail='$arupfemail' AND ar_userid !=" . $arupfid);
        $upfsql = "UPDATE ar_admin SET ar_authemail='$arupfemail', ar_authorname='$arupfname', ar_company ='$arupfcomp', ar_avatar='$arupfimg' WHERE ar_userid=" . $arupfid;

        if (mysqli_num_rows($upemquery) > 0) {
            echo json_encode(array("alert", "This email is already registered, please choose another one."));
        } else if (!mysqli_query($conn, $upfsql)) {
            echo json_encode(array("error", "Something went wrong!"));
        } else {
            echo json_encode(array("success", "Profile successfully Updated!"));
        }
        //Close connection
        mysqli_close($conn);
    }
}

//change Pass
if (isset($_POST["aruppsub"])) {

    $aruppid = $_POST['aruppid'];
    $aruppcnt = mysqli_real_escape_string($conn, trim($_POST['aruppcnt']));
    $aruppnew = mysqli_real_escape_string($conn, trim($_POST['aruppnew']));

    if (empty($aruppnew)) {
        echo json_encode(array("alert", "Error some fields are empty!"));
    } else {
        //$uppquery = "SELECT "
        $aruppcnt = md5($aruppcnt);
        $aruppnew = md5($aruppnew);
        $uppquery = "SELECT ar_password FROM ar_admin WHERE ar_userid=" . $aruppid . " AND ar_password='$aruppcnt'";
        $uppresult = mysqli_query($conn, $uppquery);

        if (mysqli_num_rows($uppresult) > 0) {
            $uppsql = "UPDATE ar_admin SET ar_password='$aruppnew' WHERE ar_userid=" . $aruppid;

            if (!mysqli_query($conn, $uppsql)) {
                echo json_encode(array("error", "Something went wrong!"));
            } else {
                echo json_encode(array("success", "Password successfully Updated!"));
            }
        } else {
            echo json_encode(array("alert", "Old password doesn't match!"));
        }


        //Close connection
        mysqli_close($conn);
    }
}
// ============================================================== 
// End of Update Current Profile and Single User Profile page handle
// ==============================================================

// ============================================================== 
// Manage Profile page handle
// ==============================================================

if (isset($_POST["arusrchecked"])) { //For Checked

    $arusrchecked = $_POST['arusrchecked'];
    $arusrvalA = $_POST['arusrval'];

    if (empty($arusrchecked) || empty($arusrvalA) || $arusrchecked != "checked") {
        echo json_encode(array("error", "Something went wrong!"));
    } else {

        $upusrsqlA = "UPDATE ar_admin SET ar_role='superadmin' WHERE ar_userid=" . $arusrvalA;

        if (!mysqli_query($conn, $upusrsqlA)) {
            echo json_encode(array("error", "Something went wrong!"));
        } else {
            echo json_encode(array("success", "User rights changed to SUPER ADMIN!"));
        }
        //Close connection
        mysqli_close($conn);
    }
}

if (isset($_POST["arusruncheck"])) { //for Unchecked

    $arusruncheck = $_POST['arusruncheck'];
    $arusrvalB = $_POST['arusrval'];

    if (empty($arusruncheck) || empty($arusrvalB) || $arusruncheck != "unchecked") {
        echo json_encode(array("error", "Something went wrong!"));
    } else {

        $upusrsqlB = "UPDATE ar_admin SET ar_role='author' WHERE ar_userid=" . $arusrvalB;

        if (!mysqli_query($conn, $upusrsqlB)) {
            echo json_encode(array("error", "Something went wrong!"));
        } else {
            echo json_encode(array("success", "User rights changed to AUTHOR!"));
        }
        //Close connection
        mysqli_close($conn);
    }
}

if (isset($_POST["aruserdel"])) { //for deleting User

    $aruserdel = $_POST['aruserdel'];

    if (empty($aruserdel)) {
        echo "error";
    } else {
        $delusrsql = "DELETE FROM ar_admin WHERE ar_userid=" . $aruserdel;
        if (!mysqli_query($conn, $delusrsql)) {
            echo "error";
        } else {
            echo "yes";
        }
        //Close connection
        mysqli_close($conn);
    }
}
// ============================================================== 
// Manage Profile page handle
// ==============================================================

// ============================================================== 
//Forget password save page handle
// ==============================================================
if (isset($_POST["arpassnup"])) {

    $arnuser = mysqli_real_escape_string($conn, trim($_POST['arnuser']));
    $arrecnpass = mysqli_real_escape_string($conn, trim($_POST['arrecnpass']));

    if (empty($arnuser) && empty($arrecnpass)) {
        echo "NO";
    } else {
        $arrecnpass = md5($arrecnpass);
        $passnquery = "SELECT ar_password FROM ar_admin WHERE ar_username='$arnuser'";
        $passnresult = mysqli_query($conn, $passnquery);

        if (mysqli_num_rows($passnresult) == 1) {
            $passnsql = "UPDATE ar_admin SET ar_password='$arrecnpass' WHERE ar_username='$arnuser'";

            if (!mysqli_query($conn, $passnsql)) {
                echo "NO";
            } else {
                echo "YES";
            }
        } else {
            echo "INVALID";
        }
        setcookie("arlenpr", "none", time() - 900, '/');
        //Close connection
        mysqli_close($conn);
    }
}

// ============================================================== 
//End of Forget password save page handle
// ==============================================================

// ============================================================== 
//Settings page handle
// ==============================================================
if (isset($_POST["configsave"])) {

    $fdashboard = mysqli_real_escape_string($conn, ($_POST["dashboard"]));
    $ffrontend = mysqli_real_escape_string($conn, $_POST["frontend"]);
    $fmail = mysqli_real_escape_string($conn, $_POST["mail"]);

    $fquery = "UPDATE ar_meta SET dashboard='$fdashboard', frontend='$ffrontend', mail='$fmail' WHERE id= 1";
    if (!mysqli_query($conn, $fquery)) {
        echo "NO";
    } else {
        echo "YES";
    }

    mysqli_close($conn);
}

// ============================================================== 
//End of Settings page handle
// ==============================================================