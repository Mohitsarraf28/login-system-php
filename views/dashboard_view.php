<?php
// public/dashboard.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User Dashboard for managing account and settings.">
    <meta name="keywords" content="dashboard, user management, account, settings">
    <meta name="author" content="Your Name">
    <title>User Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Welcome, <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <div class="flex items-center mb-4">
            <a href="../public/logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="admin.php" class="bg-blue-500 text-white px-4 py-2 rounded ml-4 hover:bg-blue-600">Admin Dashboard</a>
            <?php endif; ?>
        </div>
        <!-- Add more content here -->
    </div>
</body>
</html>
