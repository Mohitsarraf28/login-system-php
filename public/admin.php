<?php
// public/admin.php
session_start();
require_once '../config/database.php';
require_once '../controllers/AdminController.php';
require_once '../models/User.php';

// Debug: Print session data
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Initialize AdminController
$adminController = new AdminController($conn);
$users = $adminController->getAllUsers();

// Include the admin view
include '../views/admin_view.php';
?>
