<?php
$login = true;
require_once "lib/site.inc.php";

if (isset($_REQUEST['username'])) {

    $game = new GetGameStatus($site);

    $message = $game->getPlayerOne($_REQUEST['username']);

    if ($message) {
        echo $message;
        exit;
    } else {
        $message = 'fail';
        echo $message;
    }
}

?>