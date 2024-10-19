<?php
function displayUsers()
{
      global $url;
      $url = "https://fakestoreapi.com/users";
      $response = file_get_contents($url);
      $data = json_decode($response, true);

      // print '<pre>';
      // print_r("TESTING" . $response);
      // exit();

      if (empty($data)) {
            echo "No users found.";
            return;
      }

      foreach ($data as $user) {
            $id = htmlspecialchars($user['id']);
            $name = htmlspecialchars($user['name']['firstname'] . " " . $user['name']['lastname']);
            $email = htmlspecialchars($user['email']);
            $address = htmlspecialchars($user['address']['city'] . ", " . $user['address']['street']);
            $phone = htmlspecialchars($user['phone']);

            echo "<div style='margin-bottom: 10px;'>";
            echo "<strong>ID:</strong> $id<br>";
            echo "<strong>Name:</strong> $name<br>";
            echo "<strong>Email:</strong> $email<br>";
            echo "<strong>Address:</strong> $address<br>";
            echo "<strong>Phone:</strong> $phone<br>";
            echo "</div><hr>";
      }
}
