<?php
session_start();
include 'db.php'; // Database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data for pre-filling the form
$stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update user information
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $occupation = $_POST['occupation'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $institution = $_POST['institution'];
    $about_me = $_POST['about_me'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $skills = $_POST['skills'];
    $hobbies = $_POST['hobbies'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $x = $_POST['x'];

    $stmt = $pdo->prepare("
        UPDATE user SET 
            full_name = :full_name, 
            age = :age, 
            occupation = :occupation, 
            department = :department, 
            year = :year, 
            institution = :institution, 
            about_me = :about_me, 
            email = :email, 
            phone = :phone, 
            skills = :skills, 
            hobbies = :hobbies, 
            instagram = :instagram, 
            linkedin = :linkedin, 
            x = :x 
        WHERE id = :id
    ");
    $stmt->execute([
        'full_name' => $full_name,
        'age' => $age,
        'occupation' => $occupation,
        'department' => $department,
        'year' => $year,
        'institution' => $institution,
        'about_me' => $about_me,
        'email' => $email,
        'phone' => $phone,
        'skills' => $skills,
        'hobbies' => $hobbies,
        'instagram' => $instagram,
        'linkedin' => $linkedin,
        'x' => $x,
        'id' => $user_id,
    ]);

    echo "Profile updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
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
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
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
            display: block;
            margin: 0 auto;
        }

        button[type="submit"]:hover {
            background-color: #218838;
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
        <h1>Update Profile</h1>

        <form method="POST" action="">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($user['age']); ?>" required>

            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" value="<?php echo htmlspecialchars($user['occupation']); ?>" required>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" value="<?php echo htmlspecialchars($user['department']); ?>" required>

            <label for="year">Year:</label>
            <input type="number" id="year" name="year" value="<?php echo htmlspecialchars($user['year']); ?>" required>

            <label for="institution">Institution:</label>
            <input type="text" id="institution" name="institution" value="<?php echo htmlspecialchars($user['institution']); ?>" required>

            <label for="about_me">About Me:</label>
            <textarea id="about_me" name="about_me" required><?php echo htmlspecialchars($user['about_me']); ?></textarea>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>

            <label for="skills">Skills:</label>
            <input type="text" id="skills" name="skills" value="<?php echo htmlspecialchars($user['skills']); ?>" required>

            <label for="hobbies">Hobbies:</label>
            <input type="text" id="hobbies" name="hobbies" value="<?php echo htmlspecialchars($user['hobbies']); ?>" required>

            <label for="instagram">Instagram:</label>
            <input type="url" id="instagram" name="instagram" value="<?php echo htmlspecialchars($user['instagram']); ?>">

            <label for="linkedin">LinkedIn:</label>
            <input type="url" id="linkedin" name="linkedin" value="<?php echo htmlspecialchars($user['linkedin']); ?>">

            <label for="x">X:</label>
            <input type="url" id="x" name="x" value="<?php echo htmlspecialchars($user['x']); ?>">

            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>






