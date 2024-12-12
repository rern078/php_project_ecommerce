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

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
      $users = [];
      while ($row = $result->fetch_assoc()) {
            $users[] = $row;
      }
      echo json_encode($users);
} else {
      echo json_encode(["message" => "No users found"]);
}

$conn->close();
