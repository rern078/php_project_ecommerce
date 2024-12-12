<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

// Fetch data from API
$api_url = "https://reqres.in/api/users?page=2";
$data = json_decode(file_get_contents($api_url), true);

foreach ($data['data'] as $user) {
      $id = $user['id'];
      $email = $user['email'];
      $first_name = $user['first_name'];
      $last_name = $user['last_name'];
      $avatar = $user['avatar'];

      // Insert into database
      $sql = "INSERT INTO users (id, email, first_name, last_name, avatar) 
            VALUES ('$id', '$email', '$first_name', '$last_name', '$avatar')
            ON DUPLICATE KEY UPDATE email='$email', first_name='$first_name', last_name='$last_name', avatar='$avatar'";

      if ($conn->query($sql) === TRUE) {
            echo "User $id inserted/updated successfully<br>";
      } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
      }
}

$conn->close();
