<?php
include_once 'includes/dbconnection.php';

if (isset($_POST)) {
    $username = $GLOBALS['con'].quote($_POST['username']);
    $password = $GLOBALS['con'].quote($_POST['password']);
    $password = password_hash($password);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $con->query($sql);
    if ($result->rowCount() > 0) {
        $row = $result->fetch();
        $_SESSION['user'] = $row;
        header('Location: success.php');
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Username or password is incorrect.
      </div>';
}
}
?>