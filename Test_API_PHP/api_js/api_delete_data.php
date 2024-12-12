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

// Get DELETE data
$input = json_decode(file_get_contents("php://input"), true);

if (isset($input['id'])) {
      $id = $input['id'];

      // Delete query
      $sql = "DELETE FROM users WHERE id=$id";

      if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "User deleted successfully"]);
      } else {
            echo json_encode(["error" => "Error deleting user: " . $conn->error]);
      }
} else {
      echo json_encode(["error" => "Invalid input: ID is required"]);
}

$conn->close();
