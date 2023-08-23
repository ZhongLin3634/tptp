<?php


// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "complainsys";
    
    //connect database
    $conn = new mysqli($servername,$username,$password,$databaseName);
    if($conn->connect_error){
        die("Failer Connect:". $conn->connect_error);
    }
    

   
    function generateMeaningfulID() {
        $prefix = 'Cp';
    
        // Check if the last ID is stored in session, if not, start from 1
        if (!isset($_SESSION['last_id'])) {
            $_SESSION['last_id'] = 1;
        }
    
        // Get the current ID
        $currentID = $_SESSION['last_id'];
    
        // Increment the ID
        $currentID++;
    
        // If the ID reaches 1001, reset it back to 1
        if ($currentID > 1000) {
            $currentID = 1;
        }
    
        // Update the last ID in the session
        $_SESSION['last_id'] = $currentID;
    
        // Generate the meaningful ID
        $meaningfulID = $prefix . '-' . date('Ymd') . '-' . str_pad($currentID, 3, '0', STR_PAD_LEFT);
    
        return $meaningfulID;
    }
    
    // Start the session (only needed if not already started)
    session_start();
    
    $complaintID = generateMeaningfulID();
    
    
    // Set the timezone to Malaysia (MYT)
    //date_default_timezone_set('Asia/Kuala_Lumpur');
    // Get the current date
    // Get the current time
    
    $timestamp = date('Y-m-d H:i:s', strtotime('+6 hours'));
    // Retrieve form data
    $complainType = mysqli_real_escape_string($conn, $_POST["complaintType"]);
    $location = mysqli_real_escape_string($conn, $_POST["Location"]);
    $category = mysqli_real_escape_string($conn, $_POST["complainCategory"]);
    $sub_category = mysqli_real_escape_string($conn, $_POST["subCategory"]);
    $subject = mysqli_real_escape_string($conn, $_POST["Subject"]);
    $attachment1 = mysqli_real_escape_string($conn, $_POST["file1"]);
    $attachment2 = mysqli_real_escape_string($conn, $_POST["file2"]);
    $attachment3 = mysqli_real_escape_string($conn, $_POST["file3"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $datetimeValue = mysqli_real_escape_string($conn, $timestamp);
    $status="New";

    

    //insert
    $insertQuery = "INSERT INTO complains (id,Location,type,category,sub_category,subject,attachment1,attachment2,attachment3,description,status,Date) VALUES ('$complaintID','$location','$complainType','$category','$sub_category','$subject','$attachment1','$attachment2','$attachment3','$description','$status','$timestamp')";

    if ($conn->query($insertQuery) === TRUE) {
        $thankLink = "thankyou.php" . "?complaintID=" . urlencode($complaintID) . "&timestamp=" . urlencode($timestamp);
        header("Location: ".$thankLink);
    } else {
        echo "Some Error Happened!".$conn->error;
    }
    // Handle file uploads
    // ... (the file upload code, as discussed earlier)

    // Save the complaint data in a database or file (you need to implement this part)
    // For this example, let's assume we save the data in a text file named "complaints.txt"
    $data = "Complaint ID: " . $complaintID . "\n";
    $data .= "Submission Date: " . $datetimeValue . "\n";
    $data .= "Type of Complaint: $complainType\n";
    $data .= "Location: $location\n";
    $data .= "Category: $category\n";
    $data .= "Sub Category: $sub_category\n";
    $data .= "Subject: $subject\n";
    $data .= "Description: $description\n";

    $file = fopen('complaints.txt', 'a');
    fwrite($file, $data);
    fclose($file);

    // Redirect to the thank you page
    
    
} else {
    // If the form is accessed directly without submission, show an error message
    echo "<h2>Error: Form not submitted</h2>";
    
}
?>
