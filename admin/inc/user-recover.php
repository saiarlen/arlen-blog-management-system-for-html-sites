<?php
/*
 * User pass Recover mail handle
 * This page used for Recover User pass functions
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


require_once("config.php");

require_once('../deps/PHPMailer/src/PHPMailer.php');
require_once('../deps/PHPMailer/src/SMTP.php');
//require_once('../deps/PHPMailer/src/Exception.php');
//Settings function init
$msettings = mysqli_query($conn, "SELECT mail FROM ar_meta WHERE id=1");
$final = mysqli_fetch_row($msettings);
$mout = json_decode($final[0], true);

function mailType($mout){
    if($mout["smtptype"] == "google"){
        return "smtp.gmail.com";
    }else if($mout["smtptype"] == "other"){
        return $mout["smtphost"];
    }
}


$armailid = mysqli_real_escape_string($conn, trim($_POST["arrecemail"]));
$armailcheck = mysqli_query($conn, "SELECT ar_username, ar_authorname, ar_company FROM ar_admin WHERE ar_authemail = '$armailid'");
//print_r($armailcheck);
if(mysqli_num_rows($armailcheck) == 1){
    $armailresult = mysqli_fetch_assoc($armailcheck);
    if(empty($armailresult['ar_company'])){
        $cmpname = 'Arlen Bms';
    }else {
        $cmpname = $armailresult['ar_company'];
    }
    function arUniqKey($c){// Random key
        $kcharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $krandomString = ''; 
        for ($i = 0; $i < $c; $i++) { 
            $kindex = rand(0, strlen($kcharacters) - 1); 
            $krandomString .= $kcharacters[$kindex]; 
        } 
        return $krandomString; 
    }

    $ar_key = arUniqKey(20);

    setcookie("arlenpr", md5($ar_key), time()+900, '/');

    $ar_url = ARLEN_BASE_URL . '/admin/recover.php?type=rpass&login=' . $armailresult['ar_username'] . '&key='. $ar_key;
 
    $mailcontent = "Someone has requested a password reset for the following account:";
    $mailcontent .= "<br><br> Username: <b>".  $armailresult['ar_username'] ."</b><br><br>";
    $mailcontent .= "If this was a mistake, just ignore this email and nothing will happen.<br><br>
     To reset your password, visit the following address:<br>";
    $mailcontent .= $ar_url;

    $mail = new PHPMailer(true); //Mail Init

    try {
        //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = mailType($mout);                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $mout['smtpuser'];                     // SMTP username
        $mail->Password   = $mout['smtppass'];   
        
        if($mout["smtptype"] == "google"){
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
        }else if($mout["smtptype"] == "other"){
            $mail->SMTPSecure = $mout["smtpsec"];
            $mail->Port = (int)$mout["smtpport"];
        }                            // SMTP password
                 // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                           // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($mout['smtpfrom'], $cmpname);
        $mail->addAddress($armailid, $armailresult['ar_authorname']);     // Add a recipient 
        //$mail->addReplyTo('no-replay@', $cmpname);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Recover Password';
        $mail->Body    = $mailcontent;
        $mail->AltBody = $mailcontent;

        $mail->send();
        echo 'YES';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}else {
    echo "NO";
}