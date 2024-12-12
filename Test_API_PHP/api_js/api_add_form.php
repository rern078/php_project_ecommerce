<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Add User</title>
</head>

<body>
      <h2>Add New User</h2>
      <form action="add_data.php" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name" required><br><br>

            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name" required><br><br>

            <label for="avatar">Avatar URL:</label><br>
            <input type="url" id="avatar" name="avatar" required><br><br>

            <input type="submit" value="Add User">
      </form>
</body>

</html>