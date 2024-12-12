<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_test";

// Get the user ID from the query string
$user_id = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

// SQL query to delete the user
$sql = "DELETE FROM users WHERE id=$user_id";

if ($conn->query($sql) === TRUE) {
      // echo "User deleted successfully";
      header("Location: api_show_form.php");
} else {
      echo "Error deleting user: " . $conn->error;
}

$conn->close();
