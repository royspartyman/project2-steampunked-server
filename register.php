<?php
echo "register: " . $_POST['token'];

$pdo = pdo_connect();
$sql = "insert into gcm(token,username) values(?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_POST['token'], $_POST['username']));


function pdo_connect()
{
    try {
        // Production server
        $dbhost = "mysql:host=mysql-user.cse.msu.edu;dbname=perrym23";
        $user = "perrym23";
        $password = "redred";
        return new PDO($dbhost, $user, $password);
    } catch (PDOException $e) {
        die("Unable to select database");
    }
}