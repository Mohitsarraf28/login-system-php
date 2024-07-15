<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User Dashboard for managing account and settings.">
    <meta name="keywords" content="dashboard, user management, account, settings">
    <meta name="author" content="Your Name">
    <title>User Dashboard</title>
    <!-- Add any additional stylesheets or scripts here -->
    <!-- <link rel="stylesheet" href="path/to/your/styles.css"> -->
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <a href="../public/logout.php">Logout</a>
        <!-- Add more content here -->
    </div>
</body>
</html>
