<?php
// public/edit_user.php
session_start();
require_once '../config/database.php';
require_once '../controllers/AdminController.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update'])) {
    $adminController = new AdminController($conn);
    $result = $adminController->updateUser($_POST['id'], $_POST['username'], $_POST['email'], $_POST['role']);
    if ($result) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Update failed.";
    }
}

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form method="POST" action="edit_user.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>" required>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
            <label for="role">Role:</label>
            <select name="role">
                <option value="user" <?php echo $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
            </select>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
