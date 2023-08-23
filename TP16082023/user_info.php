<!-- user_info.php -->
<?php
// Replace these variables with actual user data from your database or session
$Username = "E Zhong Lin";
$email = "zonglin95-@gmail.com";
$FirstName = "E";
$LastName = "Zhong Lin";
$Address = "C142, Cypress Condominium";
$age = 21;
$city = 'Selangor';
$Country = 'Malaysia';
$PostalCode = '43000';
?>

<h2>User Information</h2>
<p><strong>Username:</strong> <?php echo $Username; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>First Name:</strong> <?php echo $FirstName; ?></p>
<p><strong>Last Name:</strong> <?php echo $LastName; ?></p>
<p><strong>Address:</strong> <?php echo $Address; ?></p>
<p><strong>Age:</strong> <?php echo $age; ?></p>
<p><strong>City:</strong> <?php echo $city; ?></p>
<p><strong>Country:</strong> <?php echo $Country; ?></p>
<p><strong>Postal Code:</strong> <?php echo $PostalCode; ?></p>
