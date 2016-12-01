<?php

$login = true;
require_once "lib/site.inc.php";

if (isset($_REQUEST['username']) && isset($_REQUEST['game'])) {

    $game = new NewGame($site);

    $message = $game->newGame($_REQUEST['username'], $_REQUEST['game']);

    if ($message !== null) {
        $message = "success";
        echo $message;
        exit;
    } else {
        $message = "fail";
        echo $message;
    }
}

?>