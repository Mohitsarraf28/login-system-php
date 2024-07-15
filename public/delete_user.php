<?php
// public/delete_user.php
session_start();
require_once '../config/database.php';
require_once '../controllers/AdminController.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $adminController = new AdminController($conn);
    $result = $adminController->deleteUser($_GET['id']);
    if ($result) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Delete failed.";
    }
}
?>
