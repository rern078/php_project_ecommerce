<?php
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
      die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $email = $_POST['email'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $avatar = $_POST['avatar'];

      // Insert query
      $sql = "INSERT INTO users (email, first_name, last_name, avatar) VALUES ('$email', '$first_name', '$last_name', '$avatar')";

      if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "User added successfully"]);
      } else {
            echo json_encode(["error" => "Error adding user: " . $conn->error]);
      }
} else {
      echo json_encode(["error" => "Invalid request method"]);
}

$conn->close();
