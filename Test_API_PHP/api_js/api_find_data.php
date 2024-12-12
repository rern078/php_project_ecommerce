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

// Get GET data
$id = $_GET['id'];

if (isset($id)) {
      // Select query
      $sql = "SELECT * FROM users WHERE id=$id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo json_encode($user);
      } else {
            echo json_encode(["message" => "No user found with ID $id"]);
      }
} else {
      echo json_encode(["error" => "Invalid input: ID is required"]);
}

$conn->close();
