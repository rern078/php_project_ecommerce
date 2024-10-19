<?php
// Fakestore API URL to get users
$url = "https://fakestoreapi.com/users";

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
// Disable SSL verification for testing (remove in production)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
      echo "Error fetching users: " . curl_error($ch);
      curl_close($ch);
      exit;
}

// Close cURL session
curl_close($ch);

// Decode the JSON response to PHP array
$users = json_decode($response, true);

// Check if users data exists
if (!empty($users)) {
      echo "<h2>User List</h2>";
      foreach ($users as $user) {
            $id = htmlspecialchars($user['id']);
            $name = htmlspecialchars($user['name']['firstname'] . " " . $user['name']['lastname']);
            $email = htmlspecialchars($user['email']);
            $address = htmlspecialchars($user['address']['city'] . ", " . $user['address']['street']);
            $phone = htmlspecialchars($user['phone']);

            // Display user information
            echo "<div style='margin-bottom: 10px;'>";
            echo "<strong>ID:</strong> $id<br>";
            echo "<strong>Name:</strong> $name<br>";
            echo "<strong>Email:</strong> $email<br>";
            echo "<strong>Address:</strong> $address<br>";
            echo "<strong>Phone:</strong> $phone<br>";
            echo "</div><hr>";
      }
} else {
      echo "No users found.";
}
