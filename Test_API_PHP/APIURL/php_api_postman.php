<?php
function getWithAuth()
{
      $url = "https://postman-echo.com/get";

      $options = [
            "http" => [
                  "header" => "Authorization: Bearers myFakeToken123\r\n"
            ]
      ];

      $context = stream_context_create($options);
      $response = file_get_contents($url, false, $context);
      $data = json_decode($response, true);

      if (isset($data['headers'])) {
            echo "Authorization Header: " . htmlspecialchars($data['headers']['authorization']);
      } else {
            echo "Failed to fetch data.";
      }
}

getWithAuth();
