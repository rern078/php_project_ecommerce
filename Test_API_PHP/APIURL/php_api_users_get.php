<?php
global $url;
$url = "https://jsonplaceholder.typicode.com/users";
$response = file_get_contents($url);
// echo $response;

if ($response === FALSE) {
      echo "Error fetching the data!";
      exit;
}

$data = json_decode($response, true);

if (!empty($data)) {
      foreach ($data as $user) {
            $id = htmlspecialchars($user['id']);
            $name = htmlspecialchars($user['name']);
            $email = htmlspecialchars($user['email']);
            $address = htmlspecialchars($user['address']['city'] . ", " . $user['address']['street']);
            $phone = htmlspecialchars($user['phone']);
            echo "<div style='margin-bottom: 10px;'>";
            echo "<strong>ID:</strong> $id<br />";
            echo "<strong>Name:</strong> $name<br />";
            echo "<strong>Email:</strong> $email<br />";
            echo "<strong>Address:</strong> $address<br />";
            echo "<strong>Phone:</strong> $phone<br />";
            echo "</div><hr>";
      }
} else {
      echo "No data found.";
}
