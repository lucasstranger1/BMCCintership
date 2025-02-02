<!DOCTYPE html>
                <html>
                <head>
                    <title>Major Course Planner</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            display: block;
                            margin:0px auto;
                            padding: 0px;
                            text-align: center;
                            font-size: 15px;
                        
                        }
                        .menu-items {
                flex-grow: 1;
                display: flex;
                justify-content: flex-end;
            }

                .Topbar {
            position: fixed;
            list-style-type: none;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            background-color: #1c8fa9;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
            z-index: 1000;
            }
        
            .Topbar li {
                float: left;
            }
        
            .Topbar li a {
                /* display: inline-block; */
                color: white;
                text-align: left;
                padding: 14px 10px 10px 10px;
                text-decoration: none;
                font-weight: bold;       
                background-color: #1c8fa9;
                
            }      
            .Topbar a:hover {
                color: #ddd;
            }
            .fa-solid {
                    font-size: 35px; /* Adjust the size as needed */
                    margin-right: 10px; /* Optional: Adds some spacing between the icon and the text */
                    }
                    .fa-brands{
                        font-size: 35px; /* Adjust the size as needed */
                        margin-right: 10px; /* Optional: Adds some spacing between the icon and the text */
                    }
                        .container{
                    
                        background-image: url("bmccbackground.jpeg");
                        background-repeat: no-repeat;
                        background-size: contain;
                        background-position: center center;
                        background-attachment: fixed;
                        width: 100%;
                        height: 100%;
                        z-index: 2; 
                        margin-bottom: 40px;

                        }

                        label {
                            display: block;
                            margin-bottom: 10px;
                            font-size: 20px;
                        }

                        input[type="submit"] {
                            margin-top: 10px;
                        }

                        table {
                            border-collapse: collapse;
                            width: 100%;
                        }

                        th, td {
                            text-align: left;
                            padding:10px;
                            border-bottom: 1px solid #ddd;
                        }

                    

                        tr:hover {
                            background-color: #ddd;
                        }
    
                    .content {
                        background-color: rgba(255, 255, 255, 0.9);
                        margin-top: 250px;
                        align-items: center;
                        justify-content: center;
                        max-width: 1200px;
                        margin: 60px auto 30px auto;
                        }
                    .header {
                    display: flex;
                    align-items: center;
                    }

                    .header i {
                    margin-right: 5px; /* Adjust the spacing as needed */
                    }

                            .courses_taken {
                                resize: none;
                                height: 100px; /* Adjust the height as per your preference */
                                width: 300px; /* Adjust the width as per your preference */
                            }
                            form {
                                text-align: center;}
                    h2{color: #3f828e;
                        text-align: center;}
                
                    .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #3f828e;
                color: #fff;
                text-align: center;
                padding: 10px 0;
                font-size: 14px;
                z-index: 1;
            }
            .icon {
                width: 150px;
                height: 40px;
                margin-right: 10px;
                }

    
        
        h4 a {
            color: #3f828e;
        }
            .menu-items {
                flex-grow: 1;
                display: flex;
                justify-content: flex-end;
            
            }
        
            
            .search-bar {
                float: left;
                margin-top: 8px;
            }
        
            .search-form {
                margin: 0;
                padding: 0;
            }
        
            .search-form input[type="text"] {
                padding: 6px;
                border-radius: 4px;
                border: none;
                border: 1px solid black;
            }
        
            .search-form button {
                padding: 6px 10px;
                border-radius: 4px;
                border: none;
                background-color: #4CAF50;
                color: #fff;
                cursor: pointer;
            }
                </style>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
                </head>
                <body>
                <header>
            <nav>
                
                <ul class="Topbar">
                    <li class="logo-item">
                        <a href="#">
                            <img src="bmccicon.png" alt="icon" class="icon">
                        </a>
                    </li>
                    <li class="menu-items">
                        <a href="index.html">Home</a>
                        <a href="CourseSearch.php">Course Search</a>
                        <a href="MajorandClassesList.php">Major and Classes List</a>
                        <a href="MajorCoursePlanner.php">Major Course Planner</a>
                        <a href="piecharts.html">View Enrollment Data</a>
                    </li>
                    <li class="search-bar">
                        <form class="search-form">
                            <input type="text" placeholder="Search" class="search-input">
                            <button type="submit" class="search-button">Go</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
                    
                <div class="container">
                    <div class="content">
                <h2>Major Course Planner</h2>
            
                    
                        <form method="POST" action="">
                            <label for="major">Select your major:</label>
                            <select name="major" id="major">
                                <option value="1">Computer Science</option>
                                <option value="2">Computer Information Systems</option>
                                <option value="3">Computer Network Technology</option>
                                <option value="4">Geographic Information Science</option>
                            </select>
                            <br>
                            <label for="courses_taken">Enter the courses you have taken (separated by commas) example: MAT 206.5 Intermediate Algebra and Precalculus</label>
                            <textarea name="courses_taken" id="courses_taken" rows="10"><?php echo isset($_POST['courses_taken']) ? $_POST['courses_taken'] : ''; ?></textarea>
                            <br><br>

                            <input type="submit" placeholder="MAT 206.5 Intermediate Algebra and Precalculus,ENG 101 English Composition" name="submit" value="Submit">
                        </form>
                        <footer class="footer">
            @ Borough of Manhattan Community College | 199 Chambers Street | New York, NY 10007 | Contact Us | Privacy Policy
        </footer>
        <?php
        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            $majorId = $_POST['major'];
            $coursesTaken = explode(",", $_POST['courses_taken']);

            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "Majors";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve course details for the major
            $courseQuery = "SELECT * FROM Courses WHERE major_id = $majorId";
            $courseResult = $conn->query($courseQuery);

            $remainingCourses = array();
            $remainingCredits = 0;
            $takenCourses = 0; // Initialize the count of taken courses
            // Create a variable to store the total credits taken by the user
            $totalCreditsTaken = 0;
            if ($courseResult->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Course Name</th><th>Credits</th></tr>";

                while ($course = $courseResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $course['course_name'] . "</td>";
                    echo "<td>" . $course['credits'] . "</td>";
                    echo "</tr>";

                    // Check if the course is already taken
                    if (!in_array($course['course_name'], $coursesTaken)) {
                        $remainingCourses[] = $course['course_name'];
                        $remainingCredits += $course['credits'];
                    } else {
                        $takenCourses++; // Increment the count of taken courses
                        $totalCreditsTaken += $course['credits']; // Add the credits to the total credits variable
                    }
                }

                echo "</table>";

                $totalRequiredCourses = $courseResult->num_rows;
                $completionPercentage = ceil(($takenCourses / $totalRequiredCourses) * 100);

                echo "<h3>Courses Taken:</h3>";
                echo "<table>";
                echo "<tr><th>Course Name</th><th>Credits</th></tr>";
                foreach ($coursesTaken as $course) {
                    $courseQuery = "SELECT * FROM Courses WHERE course_name = '$course'";
                    $courseResult = $conn->query($courseQuery);
                    $takenCourse = $courseResult->fetch_assoc();
                    echo "<tr><td>{$takenCourse['course_name']}</td><td>{$takenCourse['credits']}</td></tr>";
                }
                echo "</table>";

                echo "<h3>Credits Taken:</h3>";
                echo "<p>$totalCreditsTaken credits</p>";

                echo "<h3>Remaining Courses:</h3>";
                if (!empty($remainingCourses)) {
                    echo "<table>";
                    echo "<tr><th>Course Name</th><th>Credits</th></tr>";
                    foreach ($remainingCourses as $course) {
                        $courseQuery = "SELECT * FROM Courses WHERE course_name = '$course'";
                        $courseResult = $conn->query($courseQuery);
                        $remainingCourse = $courseResult->fetch_assoc();
                        echo "<tr><td>{$remainingCourse['course_name']}</td><td>{$remainingCourse['credits']}</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No remaining courses.</p>";
                }

                echo "<h3>Remaining Credits:</h3>";
                echo "<p>$remainingCredits credits</p>";

                echo "<h3>Degree Completion:</h3>";
                echo "<p>$completionPercentage% completed</p>";
            } else {
                echo "No courses found for the selected major.";
            }

            // Close the database connection
            $conn->close();
        }
        ?>
        </div>  
        </div>
        <h4  >Note: The table shows the four categories:Individual and Society, US Experience in Its Diversity, World Cultures and Global Issues, and Program Electives will be displaying 
                on the page <a href="electives.php"> Elective Courses <br> <br> <br></a>
                </body>
                </html>
