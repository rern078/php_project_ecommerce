<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>API SHOW ONE PAGE</title>
</head>

<body>
      <h1>User List</h1>
      <div id="user-list"></div>

      <script>
            // Fetch data from API
            fetch('https://reqres.in/api/users?page=2')
                  .then(response => response.json())
                  .then(data => {
                        const users = data.data; // Access user data array
                        const userList = document.getElementById('user-list');

                        // Loop through users and add them to the page
                        users.forEach(user => {
                              const userCard = `
                                    <div style="border: 1px solid #ccc; padding: 10px; margin: 10px; display: flex; align-items: center;">
                                    <img src="${user.avatar}" alt="${user.first_name}" style="border-radius: 50%; margin-right: 15px;">
                                    <div>
                                    <h3>${user.first_name} ${user.last_name}</h3>
                                    <p>Email: ${user.email}</p>
                                    </div>
                                    </div>
                              `;
                              userList.innerHTML += userCard;
                        });
                  })
                  .catch(error => console.error('Error:', error));
      </script>
</body>

</html>