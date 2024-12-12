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

// Get PUT data
$input = json_decode(file_get_contents("php://input"), true);

if (isset($input['id']) && isset($input['email']) && isset($input['first_name']) && isset($input['last_name']) && isset($input['avatar'])) {
      $id = $input['id'];
      $email = $input['email'];
      $first_name = $input['first_name'];
      $last_name = $input['last_name'];
      $avatar = $input['avatar'];

      // Update query
      $sql = "UPDATE users SET email='$email', first_name='$first_name', last_name='$last_name', avatar='$avatar' WHERE id=$id";

      if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "User updated successfully"]);
      } else {
            echo json_encode(["error" => "Error updating user: " . $conn->error]);
      }
} else {
      echo json_encode(["error" => "Invalid input data"]);
}

$conn->close();
