<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_test";

// Get the data from the form
$user_id = $_POST['id'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$avatar = $_POST['avatar'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

// SQL query to update the user data
$sql = "UPDATE users SET email='$email', first_name='$first_name', last_name='$last_name', avatar='$avatar' WHERE id=$user_id";

if ($conn->query($sql) === TRUE) {
      // echo "User updated successfully";
      header("Location: api_show_form.php?id=$user_id");
} else {
      echo "Error updating user: " . $conn->error;
}

$conn->close();
