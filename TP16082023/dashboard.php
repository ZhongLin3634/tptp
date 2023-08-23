<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard2.css">

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
                <!--session_start();
                header("Location: UserProfile.php?user_id=" . $userId);
                exit();-->
                <a href="UserProfile.php?user_id=<?php echo $userId;?>" class="profile-link <?php echo basename($_SERVER['PHP_SELF']) == 'UserProfile.php' ? 'active' : ''; ?>">
                <img src="a.png" alt="User Profile Icon"><br>
                <span>User Profile</span>
            </a>
        </div>

        </div>
        
        <div class="content">
            <div class="header">
                <!--<h1>Dashboard</h1>-->
                <!-- 3 Main Categories -->
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

                // Step 2: Count the number of complaints for each status
                $queryNew = "SELECT COUNT(*) as total FROM complains WHERE Status = 'New'";
                $queryInProgress = "SELECT COUNT(*) as total FROM complains WHERE Status = 'In_Progress'";
                $queryResolved = "SELECT COUNT(*) as total FROM complains WHERE Status = 'Resolved'";

                $resultNew = mysqli_query($connection, $queryNew);
                $resultInProgress = mysqli_query($connection, $queryInProgress);
                $resultResolved = mysqli_query($connection, $queryResolved);

                $countNew = mysqli_fetch_assoc($resultNew)['total'];
                $countInProgress = mysqli_fetch_assoc($resultInProgress)['total'];
                $countResolved = mysqli_fetch_assoc($resultResolved)['total'];
                ?>
                <!-- ... Existing code ... -->
    <!-- Pass both user_id and status as URL parameters -->
    <div class="category-buttons">
    <button class="category-button category-new"><a href="?user_id=<?php echo $userId; ?>&status=new">New (<?php echo $countNew; ?>)</a></button>
    <button class="category-button category-in-progress"><a href="?user_id=<?php echo $userId; ?>&status=in_progress">In Progress (<?php echo $countInProgress; ?>)</a></button>
    <button class="category-button category-resolved"><a href="?user_id=<?php echo $userId; ?>&status=resolved">Resolved (<?php echo $countResolved; ?>)</a></button>
</div>

                
<!-- ... Remaining code ... -->

            </div>
            <?php
                // Step 3: Close the database connection
                mysqli_close($connection);
                ?>

            <!-- Table for displaying complaints -->
            <table>
                <tr>
                    <th>Complaint ID</th>
                    <th>Location</th>
                    <th>Complaint Category</th>
                    <th>Sub_Category</th>
                    <th>Type of Complaint</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Received Date</th>
                </tr>
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

                // Step 2: Pagination
                $resultsPerPage = 10;
                $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
                $offset = ($currentPage - 1) * $resultsPerPage;

                // Step 3: Determine the complaint status filter (New, In Progress, Resolved)
                $statusFilter = '';
                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    if ($status === 'new' || $status === 'in_progress' || $status === 'resolved') {
                        $statusFilter = "AND Status = '$status'";
                    }
                }

                // Step 4: Fetch complaint data from the database with LIMIT, OFFSET, and Status filter
                $query = "SELECT * FROM complains WHERE 1 $statusFilter ORDER BY Date DESC LIMIT $resultsPerPage OFFSET $offset"; // Add ORDER BY Date DESC to sort by submission date
                $result = mysqli_query($connection, $query);

                // Check if the query was successful
                if ($result) {
                    while ($complaint = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><a href='dashboard2.php?complaint_id={$complaint['id']}&user_id={$userId}'>{$complaint['id']}</a></td>";
                        echo "<td>{$complaint['Location']}</td>";
                        echo "<td>{$complaint['category']}</td>";
                        echo "<td>{$complaint['sub_category']}</td>";
                        echo "<td>{$complaint['type']}</td>";
                        echo "<td>{$complaint['subject']}</td>";
                        $description = $complaint['description'];
                        $descriptionarray = explode('<br>',$description);
                        $outputdescription = $descriptionarray[0];
                        echo "<td>{$outputdescription}</td>";
                        echo "<td>{$complaint['Status']}</td>";
                        echo "<td>{$complaint['Date']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No complaints found.</td></tr>";
                }

                // Step 5: Display pagination links for 10 complaints per page
                $query = "SELECT COUNT(*) as total FROM complains WHERE 1 $statusFilter";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                $totalComplaints = $row['total'];
                $totalPages = ceil($totalComplaints / $resultsPerPage);
                echo '<div class="pagination">';
                if ($currentPage > 1) {
                    // Adjust the pagination link for the previous page
                    if (isset($status)) {
                        echo "<a href='dashboard.php?user_id=$userId&status=$status&page=" . ($currentPage - 1) . "'>&lt; Previous</a>";  //here 
                    } else {
                        echo "<a href='dashboard.php?user_id=$userId&page=" . ($currentPage - 1) . "'>&lt; Previous</a>";
                    }
                }
                
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i === $currentPage) {
                        echo "<span class='current-page'>$i</span>";
                    } else {
                        // Adjust the pagination link for each page
                        if (isset($status)) {
                            echo "<a href='dashboard.php?user_id=$userId&status=$status&page=$i'>$i</a>";
                        } else {
                            echo "<a href='dashboard.php?user_id=$userId&page=$i'>$i</a>";
                        }
                    }
                }
                if ($currentPage < $totalPages) {
                    // Adjust the pagination link for the next page
                    if (isset($status)) {
                        echo "<a href='dashboard.php?user_id=$userId&status=$status&page=" . ($currentPage + 1) . "'>Next &gt;</a>";
                    } else {
                        echo "<a href='dashboard.php?user_id=$userId&page=" . ($currentPage + 1) . "'>Next &gt;</a>";
                    }
                }
                
                echo '</div>';

                // Step 6: Close the database connection
                mysqli_close($connection);
                ?>
                
            </table>
            <a href="login.php" class="exit-button">Exit</a>


        </div>
    </div>
    
</body>
</html>
