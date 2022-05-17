<?php

// phpinfo();

include_once '../includes/dbconnection.php';

if (isset($_POST)) {
    $username = $GLOBALS['con']->quote($_POST['username']);
    $email = $GLOBALS['con']->quote($_POST['email']);
    $password = $GLOBALS['con']->quote($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $dbh->prepare("INSERT INTO app_user (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header('Location: ../index.php');
}
