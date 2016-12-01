<?php

$login = true;
require_once "lib/site.inc.php";

if (isset($_REQUEST['username'])) {

    $game = new JoinGame($site);

    $message = $game->CheckIfThereIsAGame($_REQUEST['username']);


    if ($message !== null) {
        //$message = "success";
        //echo $message;
        exit;
    } else {
        $message = 'fail';
        echo $message;
    }
}

?>