<?php
/*
 * login functions
 * login functions
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */
if (file_exists("admin/config.php")){
    require_once("admin/config.php");
}
function arlen_Auth($conn){
   

    if(isset($_SESSION["username"])) {
        
        header ("location: admin/home.php");

    } 
    if(isset($_POST["login"])){
        if(empty($_POST["user"]) || empty($_POST["pass"])){
            echo "<div class='field_wrong'><p>Something Went Wrong </p></div>";
        }else{
            $username = $conn-> real_escape_string($_POST['user']);
            $password = $conn-> real_escape_string($_POST['pass']);
            $password = md5($password);
            $arlen_sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
            $final = $conn-> query($arlen_sql);
            if(mysqli_num_rows($final) > 0){
                $_SESSION["username"] = $username;
                header ("location: admin/home.php");
            }else {
                echo "<script> window.onload = function() { $('#response').html(" .'"<p class=' . "'field_empty'" . '>You entered an incorrect username or password</p>"' . ").fadeIn(1000);}</script>";
            }
        }
    }

}

?>
