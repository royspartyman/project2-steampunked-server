<?php

//SteampunkedGame
$login = true;
require_once "lib/site.inc.php";

if(isset($_REQUEST['username'])) {

    $quit = new Quit($site);

    $message =  $quit->QuitGame($_REQUEST['username']);

    unset($_SESSION['user']);


    if($message !== null) {
        //$message = "success";
        //echo $message;
        exit;
    }else {
        //$message = 'fail';
        //echo $message;
        exit;
    }
}

?>
