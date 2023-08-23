<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="register_user.css">
    <h1>User Registration</h1>
</head>

<body>
    <div class="login-container">
        <div class="user-profile">
            <img src="user-icon.jpg" alt="User Profile">
        </div><br>

        <form method="POST">
            <label for="User_ID">User_ID:</label>
            <input type="text" id="User_ID" name="User_ID" required><br>
            <label for="password">Password:</label>
            <input type="password" id="passWord" name="passWord" required>
            <br><br>

            <input type="submit" value="Register"><br>
        </form>
         <!-- Back button to go to the login page -->
         <a href="login.php" class="back-button">Back</a>


        <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $databaseName = "complainsys";

            // Connect to the database
            $conn = new mysqli($servername, $username, $password, $databaseName);
            if ($conn->connect_error) {
                die("Failed to connect: " . $conn->connect_error);
            }

            // Check if the registration form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["User_ID"]) && isset($_POST["passWord"])) {
                    $userId = $_POST["User_ID"];
                    $password = $_POST["passWord"];

                    // Check if the user ID already exists in the database
                    $checkUserQuery = "SELECT id FROM users WHERE id = '$userId'";
                    $checkUserResult = $conn->query($checkUserQuery);

                    if ($checkUserResult && $checkUserResult->num_rows > 0) {
                        echo "User ID already exists. Please choose a different User ID.";
                    } else {
                        // User ID is unique, insert the new user into the database
                        $insertUserQuery = "INSERT INTO users (id, password) VALUES ('$userId', '$password')";
                        if ($conn->query($insertUserQuery) === TRUE) {
                            echo "Registration successful! You can now login with your User ID and password.";
                        } else {
                            echo "Error: " . $conn->error;
                        }
                    }
                }
            }
        ?>
        <script>
            // JavaScript function to navigate back to the previous page
            function goBack() {
                window.history.back();
            }
        </script>
    </div>
</body>
</html>
