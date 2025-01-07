<?php
session_start();
include 'db.php'; // Database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$project_id = $_GET['id'];

// Fetch project data for pre-filling the form
$stmt = $pdo->prepare("SELECT * FROM projects WHERE id = :id");
$stmt->execute(['id' => $project_id]);
$project = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $user_id = $_SESSION['user_id'];
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];

    // Prepare and execute the update query
    $stmt = $pdo->prepare("
        UPDATE projects SET 
            user_id = :user_id,
            project_name = :project_name, 
            description = :description
        WHERE id = :id
    ");
    $stmt->execute([
        'user_id' => $user_id,
        'project_name' => $project_name,
        'description' => $description,
        'id' => $project_id 
    ]);

    
    header("Location: list_project.php");
    echo "Project updated successfully!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Project</title>
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
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        /* Form Styling */
        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
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
        <h1>Update Project</h1>

        <form method="POST" action="">
            <label for="project_name">Project Name:</label>
            <input type="text" id="project_name" name="project_name" value="<?php echo htmlspecialchars($project['project_name']); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea>

            <button type="submit">Update Project</button>
        </form>
    </div>
</body>
</html>
