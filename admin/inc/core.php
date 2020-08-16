<?php 
/*
 * Core part of the application
 * This page used for adding core functions to the application
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


 require_once ("config.php");

 /* -- ============================================================== -->
    <!-- All General Functions -->
-- ============================================================== */

/* For Generate Rando String */
 function arRandomString($length = 4) {
    $ar_characters = '0123456789';
    $ar_charactersLength = strlen($ar_characters);
    $ar_randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $ar_randomString .= $ar_characters[rand(0, $ar_charactersLength - 1)];
    }
    return $ar_randomString;
}

 /* For  Excerpt Word Limit */
 function limit_excerpt($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}
   




















?>