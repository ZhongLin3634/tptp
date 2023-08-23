<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="userprofile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>
    <?php 
        // Make sure to start the session at the beginning of the script
        session_start();

        // Check if the user ID is passed in the URL
        if (isset($_GET['user_id'])) {
            $userId = $_GET['user_id'];

            // Now you have access to the user ID, and you can use it as needed in your "UserProfile.php" file.
            // For example, you can use it to display user-specific data or perform actions related to the user.
        }

        include 'process_form.php'; 
        $currentPage = basename($_SERVER['PHP_SELF']);
        $userId = isset($_GET['user_id']) ? $_GET['user_id'] : "";
        if(isset($_GET['user_id'])){
            $usertable = new usertable();
            $userData = $usertable->fetchData($_GET['user_id']);  //adjut this to show the user_id =1
        }
    ?>
    <div class="container">
        <!--left side sidebal-->
        <div class = "sidebar">
            <div class="avatar">
                <img src="<?php echo showavatar(); ?>" alt="Avatar">
            </div>
            <br><h2>Hello <br><?php echo checkid();?>!</h2>
            <a href="dashboard.php?user_id=<?php echo $userId; ?>" class="sidelink <?php if ($currentPage == 'dashboard.php') echo 'currentlink'; ?>">Dashboard</a><br>
            <a href="index1.php?user_id=<?php echo $userId; ?>" class="sidelink <?php if ($currentPage == 'index1.php') echo 'currentlink'; ?>">Complain</a><br>

        </div>
        <div class="heading">
                <h2 style="margin-left:20px">User Profile</h2> 
                <hr style="width:1140px;margin:10px;color:LightGrey">
        </div>
        <div class= "card">
                <div class="avatar">
                    <img src="<?php echo showavatar(); ?>" alt="Avatar">
                </div> <br><br><br>
                <h2><?php echo $userData["username"]?></h2>
                <p class="title">CEO & Founder, Example</p>
                <p>Harvard University</p>
            
            </div>
        

        <!--add something-->
        

        <!-- Container C: Right side -->
        <form method="POST" action="process_form.php" class = "attributeform">
            <div class = "rows">        
           <!-- <div class="avatarpart">
                <input type="file" id="uploader" name="avatar" >
                <div class="avatarinner">
                    <label for="uploader">
                        <img src="<?php echo showavatar(); ?>" alt="Avatar">
                    </label>
                </div>
                
            </div>-->
            <h2 style="font-size:20px">Edit Profile</h2>
            <br>
            <div class="content">
                <div class="rows">
                    <div class="Attributes">
                        <div>Username</div>
                        <div><input type="text" name="username" class="Attr" value="<?php echo $userData["username"]?>"></div>
                    </div>
                <div class="Attributes">
                        <div>Email Address</div>
                        <div><input type="text" name="email" class="Attr" value="<?php echo $userData["email"]?>"></div>
                </div>
            </div>
            <div class="rows">
                <div class="Attributes">
                    <div>Firstname</div>
                    <div><input type="text" name="firstname" class="Attr" value="<?php echo $userData["firstname"]?>"></div>
                </div>
                <div class="Attributes">
                    <div>Lastname</div>
                    <div><input type="text" name="lastname" class="Attr" value="<?php echo $userData["lastname"]?>"></div>
                </div>
            </div>

            <div class="rows">
                <div class="Attributes">
                    <div>Department</div>
                    <div><input type="text" name="department" class="Attr" value="<?php echo $userData["department"]?>"></div>
                </div>
            </div>
                
            <div class="rows">
                <div class="Attributes">
                    <div >About Me</div>
                    <div ><textarea type="textarea" name="Aboutme" id="Aboutme" class="Attr"><?php echo $userData["aboutme"]?></textarea></div>
                </div>
            </div>
            
            <input type="hidden" name="user_id" value="<?php echo isset($_GET['user_id']) ? $_GET['user_id'] : ''; ?>">
            <div class= "button"><button type="submit" name="submitb" id="subbutton" >Update</button></div>
    </div>
        </form>

    <!-- ... Rest of your HTML code ... -->
    </div>
</body>
</html>
