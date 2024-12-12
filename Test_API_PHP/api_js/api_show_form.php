<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Users List</title>
      <style>
            table {
                  width: 100%;
                  border-collapse: collapse;
            }

            table,
            th,
            td {
                  border: 1px solid black;
                  padding: 8px;
                  text-align: left;
            }

            th {
                  background-color: #f2f2f2;
            }
      </style>
</head>

<body>
      <h2>Users List</h2>
      <table>
            <thead>
                  <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Avatar</th>
                        <th>Action</th>
                  </tr>
            </thead>
            <tbody>
                  <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "api_test";

                  // Create connection
                  $conn = new mysqli($servername, $username, $password, $dbname);

                  // Check connection
                  if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                  }

                  // Query to fetch data from users table
                  $sql = "SELECT id, email, first_name, last_name, avatar FROM users";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . $row['id'] . "</td>";
                              echo "<td>" . $row['email'] . "</td>";
                              echo "<td>" . $row['first_name'] . "</td>";
                              echo "<td>" . $row['last_name'] . "</td>";
                              echo "<td><img src='" . $row['avatar'] . "' alt='Avatar' style='width: 50px; height: 50px;'></td>";
                              echo "<td>";
                              echo "<a href='api_upate_form.php?id=" . $row['id'] . "'>Update</a> | ";
                              echo "<a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")'>Delete</a>";
                              echo "</td>";
                              echo "</tr>";
                        }
                  } else {
                        echo "<tr><td colspan='6'>No users found</td></tr>";
                  }

                  $conn->close();
                  ?>
            </tbody>
      </table>
      <script>
            function confirmDelete(userId) {
                  if (confirm('Are you sure you want to delete this user?')) {
                        window.location.href = 'delete_data.php?id=' + userId;
                  }
            }
      </script>
</body>

</html>