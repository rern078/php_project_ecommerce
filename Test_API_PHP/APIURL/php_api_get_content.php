<?php
$url = "https://jsonplaceholder.typicode.com/posts";
$response = file_get_contents($url);

if ($response === FALSE) {
      echo "Error fetching the data!";
      exit;
}

$data = json_decode($response, true);

if (!empty($data)) {
      foreach ($data as $post) {
            echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($post['body']) . "</p>";
            echo "<hr>";
      }
} else {
      echo "No data found.";
}
