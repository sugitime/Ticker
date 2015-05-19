<?php
/**
 * Created by PhpStorm.
 * User: ksugihara
 * Date: 5/18/15
 * Time: 10:10 AM
 */
error_reporting(-1);
ini_set('display_errors', 'On');


require_once('HelperClass.php');

$h = new \MT\HelperClass();

//echo $h->getTweets();

echo $h->twitterGrab();


?>