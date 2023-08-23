<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="register_user.css">

    <h1>User Login</h1>
</head>

<body>
    <div class="login-container">
        <div class="user-profile">
            <img src="user-icon.jpg" alt="User Profile">
            </div><br>

        <form method="POST" >
            <label for="User_ID">User_ID:</label>
            <input type="text" id="User_ID" name="User_ID" required><br>
            <label for="password">Password:</label>
            <input type="password" id="passWord" name="passWord" required>
            <br><br>

            <input type="submit" value="Login"><br><br>

        </form>
        

        <!-- Register button to go to register_user.php -->
        <a href="register_user.php" class="register-button">Register</a><br><br>
        <a href="index1.php" class="exit-button">Exit to Complain</a>
        <?php
            //database param
            $servername = "localhost";
            $username = "root";
            $password = "";
            $databaseName = "complainsys";

            //connect database
            $conn = new mysqli($servername,$username,$password,$databaseName);
            if($conn->connect_error){
                die("Failer Connect:". $conn->connect_error);
            }
            
            //check id and password
            if ($_SERVER["REQUEST_METHOD"] == "POST") {               
                if (isset($_POST["User_ID"]) && isset($_POST["passWord"])) {                   
                    $userId = $_POST["User_ID"];
                    $password = $_POST["passWord"];
                    $sql = "SELECT id, password FROM users WHERE id = '$userId' LIMIT 1";
                    $result = $conn->query($sql);      
                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $dbPassword = $row["password"];       
                        // Add this code after the successful login check
                        if ($password == $dbPassword) {
                            // Start a session
                            session_start();
                            header("Location: dashboard.php?user_id=" . $userId);
                            exit();
                        } else {
                            echo "Failed! Please Check User ID and Password";
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
