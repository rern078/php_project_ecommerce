<?php
$url = "https://jsonplaceholder.typicode.com/posts"; // API returning multiple posts

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Get the response as a string
curl_setopt($ch, CURLOPT_TIMEOUT, 10);           // Timeout if API takes too long

// Execute cURL request
$response = curl_exec($ch);

// Check if the request was successful
if (curl_errno($ch) || curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
      echo "Error fetching data: " . curl_error($ch);
      curl_close($ch);
      exit;
}

// Close cURL session
curl_close($ch);

// Decode JSON response to PHP array
$data = json_decode($response, true);

// Check if data is not empty
if (!empty($data)) {
      // Loop through each post
      foreach ($data as $post) {
            echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($post['body']) . "</p>";
            echo "<hr>";
      }
} else {
      echo "No data found.";
}
