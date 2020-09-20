<?php
/*
 * Logout page
 * This page used for Logut logic
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


Session_start();
Session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>