<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>API SHOW ALL PAGE</title>
</head>

<body>
      <h1>User List</h1>
      <div id="user-list"></div>

      <script>
            async function fetchAllPages() {
                  const baseUrl = 'https://reqres.in/api/users';
                  let currentPage = 1;
                  let totalPages = 1; // Start with 1; we'll update it dynamically.
                  const allUsers = [];

                  while (currentPage <= totalPages) {
                        try {
                              // Fetch data for the current page
                              const response = await fetch(`${baseUrl}?page=${currentPage}`);
                              const data = await response.json();

                              // Add users from the current page to the allUsers array
                              allUsers.push(...data.data);

                              // Update totalPages from the API response
                              totalPages = data.total_pages;

                              // Increment currentPage for the next iteration
                              currentPage++;
                        } catch (error) {
                              console.error(`Error fetching page ${currentPage}:`, error);
                              break;
                        }
                  }

                  console.log('All Users:', allUsers);
                  return allUsers; // Return the combined user data
            }

            // Call the function to fetch all users
            fetchAllPages();
            async function fetchAllPagesAndDisplay() {
                  const allUsers = await fetchAllPages();
                  const userList = document.getElementById('user-list');

                  allUsers.forEach(user => {
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
            }

            // Call this in your HTML with a div having id="user-list"
            fetchAllPagesAndDisplay();
      </script>
</body>

</html>