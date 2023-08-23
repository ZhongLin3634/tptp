<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Add the Bootstrap CSS link here -->
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
    /* Custom styles for the profile card */
    .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f2f2f2;
            padding: 10px;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .header-left img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .header-left h4 {
            margin: 0;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .header-right .status,
        .header-right .notification,
        .header-right .settings {
            margin-right: 20px;
        }

        .header-right img {
            width: 30px;
            height: 30px;
            margin-right: 5px;
        }
        /*index4*/
    .profile-cardright {
        height: 800px; /* Set minimum height for Container B */
        padding: 50px; /*置中*/
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 1000px;
        background-color: #f2f2f2; /* Change the background color here */
    }
    .profile-cardleft {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        height: 800px; /* Set the height here */
        background-color: #f2f2f2; /* Change the background color here */
    }
    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr; /* Two columns for the two boxes */
        gap: 20px;
    }
    /* Additional styles for better alignment */
    .profile-container {
        display: flex;
        justify-content: space-between;
    }
    .left-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width:600px;
        height:700px;
    }
    .team_member_container {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        height: 600px; /* Set the height here */
        background-color: #f2f2f2; /* Change the background color here */
    }
    /* Styles for team_name and team_info (optional) */
    .team_name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .team_info p {
        margin: 0;
    }
    .profile-cardleft, .profile-cardright,.team_member_container {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    /* Styles for the sidebar */
    .sidebar {
        background-color: #fff; /* White background for the sidebar */
        color: #333; /* Dark text color */
        width: 250px;
        padding: 20px;
    }
    .user-profile {
        text-align: center;
        margin-bottom: 50px;
    }
    .user-profile img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
    }
    .user-profile h6 {
        margin: 10px;
        font-size: 16px;
    }
    .user-profile h6:last-child {
        font-weight: bold;
    }
    </style>
</head>
<body>
<div class="container mt-4">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h4>User Profile</h4>
            </div>
            <div class="header-right">
                <div class="status">
                    <img src="status.png" alt="Status Icon">
                    <span>Online</span>
                </div>
                <div class="notification">
                    <img src="notification.png" alt="Notification Icon">
                    <span>3</span>
                </div>
                <div class="settings">
                    <img src="setting.png" alt="Settings Icon">
                    <span>Settings</span>
                </div>
            </div>
        </div>

    <div class="content">
        <!-- CSS Grid for the profile-container and the two boxes -->
        <div class="grid-container">
            <!-- Container A: Left side -->
            <div class="left-container">
                <!-- Sub-container A1: Top part -->
                <div class="profile-cardleft">
                    <img src="path/to/profile_picture.jpg" alt="Profile Picture" class="profile-avatar">
                    <div class="profile-name">John Doe</div>
                    <div class="profile-info">
                        <p><strong>Email:</strong> john.doe@example.com</p>
                        <p><strong>Age:</strong> 30</p>
                        <p><strong>Location:</strong> New York, USA</p>
                        <!-- Add more profile information here as needed -->
                    </div>
                </div>

                <!-- Sub-container A2: Bottom part -->
                <div class="team_member_container">
                    <div class="team_name">Team Member</div>
                    <div class="team_info">
                        <!-- Add team member information here -->
                        <p>E Zhong Lin</p>
                        <p>Bo xuan</p>
                        <p>Kabilan</p>
                    </div>
                </div>
            </div>

            <!-- Container B: Right side -->
            <div class="profile-cardright">
                <img src="path/to/profile_picture.jpg" alt="Profile Picture" class="profile-avatar">
                <div class="profile-name">Bob Smith</div>
                <div class="profile-info">
                    <p><strong>Email:</strong> bob.smith@example.com</p>
                    <p><strong>Age:</strong> 35</p>
                    <p><strong>Location:</strong> Chicago, USA</p>
                    <!-- Add more profile information here as needed -->
                </div>
            </div>
        </div>
    </div>
    <a href="dashboard.php">Return to Dashboard</a>

<!-- Your scripts here -->
</body>
</html>
