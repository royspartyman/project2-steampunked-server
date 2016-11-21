<?php
$login = false;
require_once "lib/site.inc.php";

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {

    $users = new Users($site);

    $user = $users->login($_REQUEST['username'], $_REQUEST['password']);
    if($user !== null) {
        $_SESSION['user'] = $user;
        $message = "success";
        echo $message;
        exit;
    }else{
        $message = 'failed login';
        echo $message;
    }
}

?>
