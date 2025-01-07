<!DOCTYPE html>
<html>
    <head>
         <style>
            html {
            scroll-behavior: smooth;
            }
            table {
                border-spacing: 0;
                text-align: center;
                margin-left: 30%;
                margin-right: 30%;
                font-size: 25px;
            }
            ul ,li{
                padding-left: 10px;
                color: rgb(120, 61, 13);
                font-size: 30px;
            }
        </style>
    </head>
    
<body background="">
    <div style="text-align: center;">
        <div >
            
            <ul style="padding: 30px;" >
                <li style="display: inline;"></li><a href="#about">ABOUT ME</a>&nbsp;
                <li style="display: inline;"></li><a href="#project">PROJECTS</a>&nbsp;
                <li style="display: inline;"></li><a href="#contact">CONTACT</a>
                <li style="display: inline;"></li><a href="login.php">LOGIN</a>
            </ul>
        </div>
    </div>
    <?php
    

        // Include the database connection
        include 'db.php';

        try {
            // Fetch user data from the database
            $stmt = $pdo->query("SELECT * FROM user LIMIT 1");
            $user = $stmt->fetch(); // Use fetch() for a single result
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
        ?>

        <div style="text-align: left; padding-top: 50px; margin-left: 20%; margin-right: 20%;">
            <img src="images/dawit.jpg" width="400PX" height="auto" style="padding: 25px; float: left;">
            <h1 style="color: rgb(120, 61, 13); font-size: 50px;"><?php echo htmlspecialchars($user['full_name']); ?></h1>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Age: <?php echo htmlspecialchars($user['age']); ?></p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Occupation: <?php echo htmlspecialchars($user['occupation']); ?></p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Department: <?php echo htmlspecialchars($user['department']); ?></p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Year: <?php echo htmlspecialchars($user['year']); ?>th</p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Institution: <?php echo htmlspecialchars($user['institution']); ?></p>
        </div>


        <!-- <div style="text-align: left; padding-top: 50px;margin-left: 20%;margin-right: 20%;">
            
            
            
            
            <img src="images/dawit.jpg" width="400PX" height="auto" style="padding: 25px;float: left;">
            <h1 style="color: rgb(120, 61, 13);font-size: 50px;">Dawit Tamirat</h1>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Age : 21</p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Occupation : Student</p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Departemnt: Computer Science </p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">year:  3rd</p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">Institution: St. Mary University College</p>




            
        </div> -->
        <div id="about" style="padding-top: 25PX;  text-align: center;margin-left: 20%;margin-right: 20%;">
            <hr width="400px">
            <h2 style="color: rgb(128, 49, 0);font-size: 40px;">ABOUT ME</h2>
                <hr width="400px">
                <p style="color: rgb(114, 0, 0); font-size: 30px;"><?php echo htmlspecialchars($user['about_me']); ?></p>
        <dl>
            <dt style="color: rgb(114, 0, 0); font-size: 30px;">Skills</dt>
            <dd style="color: rgb(114, 0, 0); font-size: 30px;"><?php echo htmlspecialchars($user['skills']); ?></dd>
            <dt style="color: rgb(114, 0, 0); font-size: 30px;">Hobbies</dt>
            <dd style="color: rgb(114, 0, 0); font-size: 30px;"><?php echo htmlspecialchars($user['hobbies']); ?></dd>
          </dl>
    
        </div>
        <div id="project" style="padding-top: 25PX; text-align: center;">
            <hr width="400px">
            <h2 style="color: rgb(128, 49, 0); font-size: 40px;">PROJECTS</h2>
            <hr width="400px">
            <table border="1">
                <tr>
                    <td>Number</td>
                    <td>Project Name</td>
                    <td>Description</td>
                </tr>
                <?php
                try {
                    // Fetch projects from the database
                    $stmt = $pdo->query("SELECT * FROM projects");
                    $counter = 1;
                    while ($project = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($counter++) . "</td>";
                        echo "<td>" . htmlspecialchars($project['project_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($project['description']) . "</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='3'>Failed to fetch projects: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                }
                ?>
            </table>
        </div>

        <div id="contact" style="text-align: center; padding-top: 100px;margin-left: 20%;margin-right: 20%;">
            <hr width="400px">
            <h2 style="color: rgb(128, 49, 0);font-size: 40px;">CONTACT</h2>
                <hr width="400px">

            <p style="color: rgb(114, 0, 0); font-size: 30px;">EMAIL : <?php echo htmlspecialchars($user['email']); ?></p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;">PHONE : <?php echo htmlspecialchars($user['phone']); ?></p>
            <p style="color: rgb(114, 0, 0); font-size: 30px;padding-top: 30px">SOCIALS</p>
            <ul style="padding: 10px;">
                <li style="display: inline;"></li><a target="_blank" href="<?php echo htmlspecialchars($user['instagram']); ?>" style="color: black;">Instagram</a>&nbsp;
                <li style="display: inline;"></li><a target="_blank"  href="<?php echo htmlspecialchars($user['linkdin']); ?>" style="color: black;">linkedin</a>&nbsp;
                <li style="display: inline;"></li><a target="_blank"  href="<?php echo htmlspecialchars($user['x']); ?>" style="color: black;">x(twitter)</a>
            </ul>
        
        
    

   
    
</body>
</html>