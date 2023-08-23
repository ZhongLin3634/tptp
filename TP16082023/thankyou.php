<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
</head>
<body>
    <h1>Thank you for your response!</h1>
    <?php
    
    $complaintID = $_GET['complaintID'];
    $timestamp = $_GET['timestamp'];
    //$currentTime = $_GET['currentTime'];
    // Display the generated complaint ID, current date, and current time
    echo "<p>Your Complaint ID: $complaintID</p>";
    echo "<p>Submission Date and time: $timestamp</p>";
    //echo "<p>Submission Time: $currentTime</p>";


    
    ?>
     <!-- Back button to go to the previous page -->
     <button onclick="goBack()">Back</button>

<script>
    // JavaScript function to navigate back to the previous page
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>

