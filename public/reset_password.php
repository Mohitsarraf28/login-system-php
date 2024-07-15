<?php
// public/reset_password.php
session_start();
require_once '../config/database.php';
require_once '../controllers/AdminController.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['reset'])) {
    $adminController = new AdminController($conn);
    $result = $adminController->resetPassword($_POST['id'], $_POST['new_password']);
    if ($result) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Password reset failed.";
    }
}

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Reset Password</h1>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action="reset_password.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 font-bold mb-2">New Password:</label>
                    <input type="password" name="new_password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>
                <button type="submit" name="reset" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>
