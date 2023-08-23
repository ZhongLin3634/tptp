<!-- a.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f5f5f5;
        
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .dashboard-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .dashboard-container > div {
        flex: 0 0 calc(33.33% - 20px);
        margin-bottom: 20px;
    }

    h2 {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>
    <h1>Welcome to the Dashboard!</h1>
    <div class="dashboard-container">
        <!-- Display user profile here -->
        <div class="profile">
            <?php include 'profile.php'; ?>
        </div>
        <!-- Display user information here -->
        <div class="user-info">
            <?php include 'user_info.php'; ?>
        </div>
        <!-- Allow editing user information here -->
        <div class="edit-info">
            <?php include 'edit_user_info.php'; ?>
        </div>
    </div>
    <!-- Return button to navigate back to the dashboard -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="dashboard.php" style="text-decoration: none;">
            <button type="button" style="padding: 10px 20px; background-color: #f44336; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
                Return to Dashboard
            </button>
        </a>
</div>
</body>
</html>
