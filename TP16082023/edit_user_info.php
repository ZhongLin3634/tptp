<!-- edit_user_info.php -->
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
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the input fields (not shown here for simplicity)
    // Save the updated user information to the database (not shown here for simplicity)

    // After updating the user information, redirect back to the dashboard
    header('Location: a.php');
    exit;
}
?>

<h2>Edit User Information</h2>
<form method="POST">
    <label for="age">Age:</label>
    <input type="number" name="age" id="age" value="<?php echo $age; ?>" required>

    <label for="city">City:</label>
    <input type="text" name="city" id="city" value="<?php echo $city; ?>" required>

    <!-- Additional form fields for other user information -->
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo $Username; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>

    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" value="<?php echo $FirstName; ?>" required>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" value="<?php echo $LastName; ?>" required>

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value="<?php echo $Address; ?>" required>

    <label for="country">Country:</label>
    <input type="text" name="country" id="country" value="<?php echo $Country; ?>" required>

    <label for="postal_code">Postal Code:</label>
    <input type="text" name="postal_code" id="postal_code" value="<?php echo $PostalCode; ?>" required>

    <button type="submit">Update</button>
</form>
