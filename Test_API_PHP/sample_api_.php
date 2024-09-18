<?php
// cURL************************************************************************
$url = 'https://example.com/webservice/RestApi/Documents/Record';
$headers = [
      'User-Agent: YetiForceRestApi',
      'x-api-key: P0fzRUuzPNWC9pxYq3MeEUp6AJ9EJpWN',
      'x-token: 9c65f656c9380b7066d992ec59c00c0d29147a579351742b0e9f43a73312f5be',
      'Content-Type: multipart/form-data'
];
$userName = 'userName';
$password = 'Password';

$cf = new CURLFile(realpath('YetiForce.pdf'));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "{$userName}:{$password}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, ['notes_title' => 'Document pdf', 'filelocationtype' => 'I', 'filename' => $cf]);

$response = curl_exec($ch);

// api************************************************************************
$url = 'https://example.com/api=RestApi/Documents/Record';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

// api_2************************************************************************

// api URL example
// [{"id":"110","employee_name":"Robin","employee_salary":"54000","employee_age":"65"},
// {"id":"112","employee_name":"Deepak","employee_salary":"12350","employee_age":"29"},
// {"id":"114","employee_name":"Ankit","employee_salary":"90000","employee_age":"18"}]

$api_url = 'https://dummy.restapiexample.com/api/v1/employees';
// Read JSON file
$json_data = file_get_contents($api_url);
// Decode JSON data into PHP array
$response_data = json_decode($json_data);
// All user data exists in 'data' object
$user_data = $response_data->data;
// Cut long data into small & select only first 10 records
$user_data = array_slice($user_data, 0, 9);
// Print data if need to debug
//print_r($user_data);
// Traverse array and display user data
foreach ($user_data as $user) {
      echo "name: " . $user->employee_name;
      echo "<br />";
      echo "name: " . $user->employee_age;
      echo "<br /> <br />";
}
?>
<?php foreach ($user_data as $user) { ?>
      <h1>name: <?php echo $user->employee_name; ?></h1>
      <?php echo $user->employee_age; ?>
<?php } ?>
<?php
define('ACCESS_TOKEN',  'your-access-token-here');
define('CLIENT_SECRET', 'your-client-secret-here');
define('CONTENT_TYPE',  'application/json');
define('ACCEPTS',       'application/json');
define('ENDPOINT',      'https://api.fortnox.se/3/');

function apiCall($requestMethod, $entity, $body = null)
{

      $curl = curl_init(ENDPOINT . $entity);
      $options = array(
            'Access-Token: ' .  ACCESS_TOKEN  . '',
            'Client-Secret: ' . CLIENT_SECRET . '',
            'Content-Type: ' .  CONTENT_TYPE  . '',
            'Accept: ' .        ACCEPTS       . ''
      );

      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $options);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $requestMethod);

      if ($requestMethod == 'POST' || $requestMethod == 'PUT') {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
      }

      $curlResponse = curl_exec($curl);
      curl_close($curl);
      return $curlResponse;
}

// ​api ***********************************************************************

$connect_api_url = "https://connect.yourcompany.com/rest-api/route";
$connect_api_key = "YfB5XBRB7slkkBSEi5qr93mWJvbpXQQy";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $connect_api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      "Authorization: Key " . $connect_api_key
));

$result = curl_exec($curl);
curl_close($curl);
echo $result;


?>
<h2 id="fact"></h2>
<button onclick="callAPI()">Make API call</button>
<script>
      async function callAPI() {
            const fact = document.getElementById('fact');
            try {
                  const res = await fetch(
                        `http://localhost/php-api-call/server/random-fact.php`
                  );
                  const response = await res.json();
                  fact.innerText = response.Fact;
            } catch (err) {
                  console.log(err);
            }
      }
</script>