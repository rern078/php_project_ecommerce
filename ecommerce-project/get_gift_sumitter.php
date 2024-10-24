<?php
include("admin/inc/config.php");

try {
      $statement = $pdo->prepare("SELECT * FROM tbl_popup ORDER BY created_at DESC LIMIT 1");
      $statement->execute();
      $image = $statement->fetch(PDO::FETCH_ASSOC);

      if ($image) {
            echo json_encode([
                  'image_url' => $image['image_url'],
                  'description' => $image['description'],
                  'width' => $image['width'],
                  'height' => $image['height']
            ]);
      } else {
            echo json_encode(['error' => 'No image found']);
      }
} catch (PDOException $e) {
      // Handle database connection or query errors
      echo json_encode(['error' => $e->getMessage()]);
}
