<?php
$url = "https://fakestoreapi.com/products";
$response = file_get_contents($url);

if ($response === FALSE) {
      echo "Error fetching the data!";
      exit;
}

$data = json_decode($response, true);

if (!empty($data)) {
      foreach ($data as $product) {
          $title = htmlspecialchars($product['title']);
            $price = htmlspecialchars($product['price']);
            $category = htmlspecialchars($product['category']);
            $image = htmlspecialchars($product['image']);
            $width = isset($product['image_width']) ? $product['image_width'] : 200; // Default to 100 if not provided
            $height = isset($product['image_height']) ? $product['image_height'] : 'auto'; // Maintain aspect ratio if not provided
            
            $rating = isset($product['rating']['rate']) ? $product['rating']['rate'] : 'N/A';
            $ratingCount = isset($product['rating']['count']) ? $product['rating']['count'] : 0;

            // Display product details with dynamic image size
            echo "<h2>$title</h2>";
            echo "<p>Price: $$price</p>";
            echo "<h2>Category: $category</h2>";
            echo "<p>Rating: $rating / 5 (based on $ratingCount reviews)</p>";
            echo "<img src='$image' width='$width' height='$height' alt='Product Image' />";
            echo "<hr>";
      }
} else {
      echo "No data found.";
}
