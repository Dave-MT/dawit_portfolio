<?php
session_start();
include 'db.php'; // Database connection

// Check if the user is logged in (optional)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM projects WHERE id = :id");
    $stmt->execute(['id' => $delete_id]);
    header("Location: list_project.php");
    exit();
}

// Fetch all projects
$stmt = $pdo->query("SELECT * FROM projects ORDER BY id DESC");
$projects = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Projects</title>
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #333;
            color: white;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        /* Content Styling */
        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }

        h1 {
            color: #333;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        table td a {
            color: #007bff;
            text-decoration: none;
        }

        table td a:hover {
            text-decoration: underline;
        }

        /* Button Styling */
        .create-project-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
            display: inline-block;
        }

        .create-project-btn:hover {
            background-color: #218838;
        }

        /* Logout button styling */
        .logout {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="text-align: center; color: #fff;">Welcome</h2>
        <a href="update_profile.php">Update Profile</a>
        <a href="list_project.php">Projects</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <div class="content">
        <h1>List of Projects</h1>
        
        <!-- Create Project Button -->
        <a href="create_project.php" class="create-project-btn">Create New Project</a>

        <!-- Projects Table -->
        <table>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?php echo htmlspecialchars($project['id']); ?></td>
                <td><?php echo htmlspecialchars($project['project_name']); ?></td>
                <td>
                    <a href="update_project.php?id=<?php echo $project['id']; ?>">Edit</a> |
                    <a href="list_project.php?delete_id=<?php echo $project['id']; ?>" onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
