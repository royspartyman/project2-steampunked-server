<?php
$login = false;
require_once "lib/site.inc.php";

unset($_SESSION['newuser-error']);

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {

$nu = new NewUsers($site);
$msg = $nu->newUser($_REQUEST['username'], $_REQUEST['password']);

if($msg !== null) {
    $_SESSION['newuser-error'] = $msg;
    $message = "success";
    echo $message;
    exit;
}else{
    $message = "failed creating new user";
    echo $message;
}
}
?>