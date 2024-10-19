<?php
function loginUser($email, $password)
{
      $url = "https://reqres.in/api/login";

      $postData = json_encode([
            "email" => $email,
            "password" => $password
      ]);

      $options = [
            "http" => [
                  "header" => "Content-Type: application/json\r\n",
                  "method" => "POST",
                  "content" => $postData
            ]
      ];

      $context = stream_context_create($options);
      $response = file_get_contents($url, false, $context);
      $data = json_decode($response, true);

      if (isset($data['token'])) {
            echo "Login successful! Token: " . htmlspecialchars($data['token']);
      } else {
            echo "Login failed: " . htmlspecialchars($data['error']);
      }
}

loginUser("eve.holt@reqres.in", "cityslicka");
