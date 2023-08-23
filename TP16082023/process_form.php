<?php



    //userprofile's submit code
    class usertable{
        public $id;
        public $password;
        public $avatar;
        public $usernamed;
        public $emailaddress;
        public $firstname;
        public $lastname;
        public $department;
        public $aboutme;

        public function fetchData($id) {
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
    
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $result = $conn->query($sql);

            if ($result){
                $row = $result->fetch_assoc();
                $id = $row["id"]; 
                $password = $row["password"]; 
                $avatar = $row["avatar"];
                $usernamed = $row["username"];
                $emailaddress = $row["EmailAddress"];
                $firstname = $row["Firstname"];
                $lastname = $row["Lastname"]; 
                $department = $row["department"];
                $aboutme = $row["Aboutme"];
            }
            return [
                "id" => $id,
                "password" => $password,
                "avatar" => $avatar,
                "username" => $usernamed,
                "email" => $emailaddress,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "department" => $department,
                "aboutme" => $aboutme
            ]; 
        }
    }

    function checkid(){
        if(isset($_GET['user_id'])){
            $usertable = new usertable();
            $userData = $usertable->fetchData($_GET['user_id']);       
            return $userData["username"];
        }else{
            echo "unknown";
        }
    }
    function showavatar(){
        if(isset($_GET['id'])){
            $usertable = new usertable();
            $userData = $usertable->fetchData($_GET['id']); 
            return $userData["avatar"];
        }else{
            return "user-icon.jpg";
        }
    }



//----------------------------------------------------------------------------------------------------------------------
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
    showavatar();
    if (isset($_POST['submitb'])) {
        $id = $_POST['user_id'];
        $avatar = mysqli_real_escape_string($conn, $_POST["avatar"]);
        $UID = mysqli_real_escape_string($conn, $_POST["username"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $department = mysqli_real_escape_string($conn, $_POST["department"]);
        $aboutme = mysqli_real_escape_string($conn, $_POST["Aboutme"]);
        $sql = "UPDATE users SET 
                avatar = '$avatar', 
                username = '$UID', 
                EmailAddress = '$email', 
                Firstname = '$firstname', 
                Lastname = '$lastname', 
                department = '$department', 
                Aboutme = '$aboutme' 
                WHERE id = '$id'";        
        if ($conn->query($sql) === TRUE) { //here boxuan need fix id= get from login.php
            echo "<script>alert('Update successfully.'); window.location = 'UserProfile.php?user_id=$id';</script>"; 
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    
?>
