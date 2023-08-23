<!DOCTYPE html>
<html>
<head>
    <title>Complaint Details</title>
    <link rel="stylesheet" href="dashboard222.css">
</head>
<body>
<?php
session_start();

// Check if the user ID is passed in the URL
include 'process_form.php'; 
$currentPage = basename($_SERVER['PHP_SELF']);
$userId = isset($_GET['user_id']) ? $_GET['user_id'] : "";
if(isset($_GET['user_id'])){

    $usertable = new usertable();
    $userData = $usertable->fetchData($_GET['user_id']);  //adjut this to show the user_id =1

}

?>

<div class="container">
    <div class="sidebar">
        <!-- User Profile Icon -->
        <div class="user-profile">
            <img src="profile-picture.jpeg" alt="User Profile">
            <h6>Hi<br><?php echo $userData['username'] ?></h6>                <br>
            <br>
            <!-- "User Profile" link/button need get from the login.php --> 
            <a href="UserProfile.php?user_id=<?php echo $userId;?>" class="profile-link <?php echo basename($_SERVER['PHP_SELF']) == 'UserProfile.php' ? 'active' : ''; ?>">
                <img src="a.png" alt="User Profile Icon"><br>
                <span>User Profile</span>
            </a>
        </div>
    </div>

    <div class="content">
        <?php
        // Step 1: Replace this with your actual database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databaseName = "complainsys";

        // Create a database connection
        $connection = mysqli_connect($servername, $username, $password, $databaseName);

        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Step 2: Check if the complaint_id parameter is set in the URL
        if (isset($_GET['complaint_id'])) {
            // Make sure to sanitize the input to prevent SQL injection
            $complaintId = mysqli_real_escape_string($connection, $_GET['complaint_id']);

            // Step 3: Fetch the complaint details from the database based on the complaint ID
            $query = "SELECT * FROM complains WHERE id = '$complaintId'"; // Replace 'complains' with the actual table name

            // Execute the query
            $result = mysqli_query($connection, $query);

            // Check if the query was successful
            if ($result) {
                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                    $complaint = mysqli_fetch_assoc($result);
                    $userID=$_GET['user_id'];
                    // Display the complaint details
                    $status = $complaint['Status'];

                    if($status === "Resolved"){
                        echo "<h1>Complaint Details for Complaint ID: {$complaint['id']}</h1>";
                        echo "<p>Location: {$complaint['Location']}</p>";
                        echo "<p>Complaint Category: {$complaint['category']}</p>";
                        echo "<p>Sub_Category: {$complaint['sub_category']}</p>";
                        echo "<p>Type of Complaint: {$complaint['type']}</p>";
                        echo "<p>Subject: {$complaint['subject']}</p>";
                        echo "<p>Description: {$complaint['description']}</p>";
                        echo "<p>Status: {$complaint['Status']}</p>";
                        echo "<p>Received Date: {$complaint['Date']}</p>";
                        echo "<form method='post'>";
                        echo "<label for='update_message'></label><br>";
                        echo "<textarea id='update_message' name='update_message' rows='4' cols='50'></textarea><br><br>";
                        echo "<button type='button' onclick=\"window.location.href='dashboard.php?user_id={$userID}'\">Back</button>";
                        echo "</form>";
                    } else {
                        echo "<h1>Complaint ID: {$complaint['id']}</h1>";
                        echo "<p>Location: {$complaint['Location']}</p>";
                        echo "<p>Complaint Category: {$complaint['category']}</p>";
                        echo "<p>Sub_Category: {$complaint['sub_category']}</p>";
                        echo "<p>Type of Complaint: {$complaint['type']}</p>";
                        echo "<p>Subject: {$complaint['subject']}</p>";
                        echo "<p>Description: {$complaint['description']}</p>";
                        echo "<p>Status: {$complaint['Status']}</p>";
                        echo "<p>Received Date: {$complaint['Date']}</p>";
                        echo "<form method='post' onsubmit='return confirmAction()'>";
                        echo "<label for='update_message'></label><br>";
                        echo "<textarea id='update_message' name='update_message' rows='4' cols='50'></textarea><br><br>";
                        echo "<button type='button' onclick=\"window.location.href='dashboard.php?user_id={$userID}'\">Back</button>";
                        echo "<input type='submit' name = 'update' value='Submit'>";
                        echo "<input type='submit' name = 'done' value='Done'>";
                        echo "</form>";
                        if(isset($_POST['done'])){
                            $status = "Resolved";
                            $id =  $complaint['id'];
                            $sql = "UPDATE complains SET Status = '$status' WHERE id = '$id'";
                            if (mysqli_query($connection, $sql)) {
                                echo "Update Successful!";
                                sleep(2);
                                header("Location: dashboard.php?user_id=".urlencode($userId));
                                exit;
                            } else {
                                echo "Update failed: " . mysqli_error($connection);
                            }
                        } else if(isset($_POST['update'])){
                            $status = "In_Progress";
                            $Content = $_POST['update_message'];
                            $originalContent = $complaint['description'];
                            $timestamp = date('Y-m-d H:i:s', strtotime('+6 hours'));
                            $Content = $originalContent . "<br>" . $timestamp . ":" . $Content;
                            $complaint['description'] = $Content;
                            $id =  $complaint['id'];

                            $sql = "UPDATE complains SET description = '$Content', Status = '$status' WHERE id = '$id'";

                            if (mysqli_query($connection, $sql)) {
                                // This is an unfinished part, and the displayed description needs to be updated immediately
                                header("Location: " . $_SERVER['PHP_SELF'] . "?complaint_id=" . urlencode($id) . "&user_id=". urlencode($userId));
                                exit;
                            } else {
                                echo "Update failed: " . mysqli_error($connection);
                            }
                        }
                    }
                } else {
                    echo "<p>No complaint found with the given ID.</p>";
                }
            } else {
                echo "<p>Error executing the query: " . mysqli_error($connection) . "</p>";
            }
        } else {
            echo "<p>No complaint ID provided.</p>";
        }

        // Step 4: Close the database connection
        mysqli_close($connection);
        ?>
    </div>
</div>

<script>
    function confirmAction() {
        return confirm("Are you sure you want to proceed?");
    }
</script>
</body>
</html>
