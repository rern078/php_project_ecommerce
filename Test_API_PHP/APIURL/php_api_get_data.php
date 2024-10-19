<?php
include('php_api_global.php');
?>
<div>
      <h2>User List</h2>
      <?php
      $users_data = displayUsers();
      echo $users_data
      ?>
</div>