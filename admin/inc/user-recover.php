<?php
/*
 * User pass Recover mail handle
 * This page used for Recover User pass functions
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


require_once("config.php");


require_once('../deps/PHPMailer/src/PHPMailer.php');
require_once('../deps/PHPMailer/src/SMTP.php');
//require_once('../deps/PHPMailer/src/Exception.php');

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
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'sai.digitalozone@gmail.com';                     // SMTP username
        $mail->Password   = 'Dsp@8096';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('no-replay@saiarlen.com', $cmpname);
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
