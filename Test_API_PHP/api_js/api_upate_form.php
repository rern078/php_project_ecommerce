<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_test";

// Get the user ID from the query string
$user_id = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$sql = "SELECT id, email, first_name, last_name, avatar FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user found with ID $user_id";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="update_data.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required><br>

        <label for="avatar">Avatar URL:</label>
        <input type="url" id="avatar" name="avatar" value="<?php echo $user['avatar']; ?>" required><br>

        <input type="submit" value="Update User">
    </form>
</body>
</html>
