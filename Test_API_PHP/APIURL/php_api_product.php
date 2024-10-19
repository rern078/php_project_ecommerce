<?php
$url = "https://fakestoreapi.com/products";

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
// Disable SSL verification (For testing only!)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Execute cURL request
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "Error fetching data: " . curl_error($ch);
} else {
    $data = json_decode($response, true);
    foreach ($data as $product) {
        echo "<h2>" . htmlspecialchars($product['title']) . "</h2>";
    }
}

// Close cURL session
curl_close($ch);
?>
