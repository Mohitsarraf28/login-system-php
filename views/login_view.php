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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen flex justify-center items-center">
        <!-- views/login_view.php -->
        <form method="post" action="../public/login.php" class="flex flex-col gap-5 shadow-2xl shadow-slate-500 rounded-3xl p-5">
            <h1 class="text-2xl font-bold text-center">Login</h1>
            <input type="email" name="email" placeholder="Email" required class="rounded-xl shadow-2xl py-2 px-4 bg-slate-200">
            <input type="password" name="password" placeholder="Password" required class="rounded-xl shadow-2xl py-2 px-4 bg-slate-200">
            <button type="submit" name="login" class="w-full bg-green-400 hover:bg-green-700 py-2 px-4 rounded-2xl text-white">Login</button>
        </form>
    </div>
</body>

</html>