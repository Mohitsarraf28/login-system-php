<?php
// public/register.php
require_once '../config/database.php';
require_once '../controllers/UserController.php';

if (isset($_POST['register'])) {
    $userController = new UserController($conn);
    $result = $userController->register($_POST['username'], $_POST['email'], $_POST['password']);
    echo $result;
} else {
    include '../views/register_view.php';
}
?>
