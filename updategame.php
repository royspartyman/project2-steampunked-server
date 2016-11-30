<?php

$login = true;
require_once "lib/site.inc.php";

if (isset($_REQUEST['username']) && isset($_REQUEST['game'])) {

    $game = new UpdateGame($site);

    $me = $game->SetGame($_REQUEST['username'], $_REQUEST['game']);
    if ($me !== null) {
        $message = "success";
        echo $message;
        exit;
    } else {
        $message = 'fail';
        echo $message;
    }
}
?>