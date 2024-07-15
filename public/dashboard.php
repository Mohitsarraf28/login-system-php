<?php
// public/dashboard.php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include '../views/dashboard_view.php';
?>
