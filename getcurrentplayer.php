<?php

$login = true;
require_once "lib/site.inc.php";

if (isset($_REQUEST['username'])) {

    $game = new GetGameStatus($site);

    $message = $game->getCurrentPlayer($_REQUEST['username']);

    echo $message;
}

?>