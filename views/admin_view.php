<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
        <a href="../public/logout.php" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Logout</a>
        <h2 class="text-2xl font-semibold mb-4">Manage Users</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">ID</th>
                        <th class="px-4 py-2 border-b">Username</th>
                        <th class="px-4 py-2 border-b">Email</th>
                        <th class="px-4 py-2 border-b">Role</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td class='px-4 py-2 border-b'>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='px-4 py-2 border-b'>" . htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='px-4 py-2 border-b'>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='px-4 py-2 border-b'>" . htmlspecialchars($row['role'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td class='px-4 py-2 border-b'>
                            <a href='edit_user.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' class='text-blue-500 hover:underline'>Edit</a> |
                            <a href='delete_user.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' class='text-red-500 hover:underline'>Delete</a> |
                            <a href='reset_password.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' class='text-yellow-500 hover:underline'>Reset Password</a>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
