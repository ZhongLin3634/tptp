<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="#">Admin</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Products</a></li>
        <!-- Add more menu items here -->
    </ul>
    <!-- "Return to Dashboard" button -->
    <a href="dashboard.php" class="return-button">Return to Dashboard</a>
</div>

<!-- Main content area -->
<div class="content">
    <h2>Welcome, Admin!</h2>

    <!-- First box: User Profile -->
    <div class="box">
        <h3>User Profile</h3>
        <!-- Display user profile information here -->
        <!-- Example: -->
        <p>Name: John Doe</p>
        <p>Email: john.doe@example.com</p>
        <!-- Add more user-related information -->
    </div>

    <!-- Second box: Team Members Available -->
    <div class="box">
        <h3>Team Members Available</h3>
        <!-- Display team member availability information here -->
        <!-- Example: -->
        <ul>
            <li>Team Member 1</li>
            <li>Team Member 2</li>
            <!-- Add more team members -->
        </ul>
    </div>

    <!-- Third box: Edit Profile -->
    <div class="box">
        <h3>Edit Profile</h3>
        <!-- Add form to edit admin's personal information -->
        <form action="update_profile.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Your Name">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Your Email">

            <!-- Add more fields for other personal information -->

            <button type="submit">Update Profile</button>
        </form>
    </div>
</div>

</body>
</html>
