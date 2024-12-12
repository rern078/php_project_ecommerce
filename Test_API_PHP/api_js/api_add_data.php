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

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['email']) && isset($data['first_name']) && isset($data['last_name']) && isset($data['avatar'])) {
      $email = $data['email'];
      $first_name = $data['first_name'];
      $last_name = $data['last_name'];
      $avatar = $data['avatar'];

      $sql = "INSERT INTO users (email, first_name, last_name, avatar) VALUES ('$email', '$first_name', '$last_name', '$avatar')";

      if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "User added successfully"]);
      } else {
            echo json_encode(["error" => "Error: " . $conn->error]);
      }
} else {
      echo json_encode(["error" => "Invalid input"]);
}

$conn->close();
