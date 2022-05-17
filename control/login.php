<?php
include_once 'includes/dbconnection.php';

if (isset($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    // $sql = "SELECT * FROM app_user WHERE email = '$email' AND password = '$password'";
    $stmt = $dbh->prepare("SELECT * FROM app_user WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $result = $GLOBALS['con']->query($sql);
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
