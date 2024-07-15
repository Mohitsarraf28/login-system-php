<?php
// public/login.php
session_start();
require_once '../config/database.php';
require_once '../controllers/UserController.php';

if (isset($_POST['login'])) {
    $userController = new UserController($conn);
    $result = $userController->login($_POST['email'], $_POST['password']);

    if ($result === "Login successful!") {
        $user = $userController->getUser();
        $_SESSION['username'] = $user->username;
        header("Location: dashboard.php");
    } else {
        echo $result;
    }
} else {
    include '../views/login_view.php';
}
?>
