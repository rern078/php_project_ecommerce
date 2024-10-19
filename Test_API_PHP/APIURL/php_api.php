<?php
$url = "https://jsonplaceholder.typicode.com/posts/1";
$response = file_get_contents($url);
$data = json_decode($response, true);
?>
<div>
      <h1>Title: <?php echo $data['title'] ?></h1>
      <p>Body: <?php echo $data['body'] ?></p>
</div>