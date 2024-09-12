<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include 'config.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
      case 'GET':
            headleGet($pdo);
            break;
      case 'POST':
            handlePost($pdo, $input);
            break;
      case 'PUT':
            handlePut($pdo, $input);
            break;
      case 'DELETE':
            handleDelete($pdo, $input);
            break;
      default:
            echo json_encode(['message' => 'Method not allowed']);
}

function headleGet($pdo)
{
      $sql = "SELECT * FROM users";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($result);
}
function handlePost($pdo, $input)
{
      $sql = "INSERT INTO users (username, email, phone) VALUES (:username, :email, :phone)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['username' => $input['username'], 'email' => $input['email'], 'phone' => $input['phone']]);
      echo json_encode(['message' => 'User created successfully']);
}
function handlePut($pdo, $input)
{
      $sql = "UPDATE users SET username = :username, email = :email, phone = :phone WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['username' => $input['username'], 'email' => $input['email'], 'phone' => $input['phone'], 'id' => $input['id']]);
      echo json_encode(['message' => 'User updated successfully']);
}
function handleDelete($pdo, $input)
{
      $sql = "DELETE FROM users WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id' => $input['id']]);
      if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'User deleted successfully']);
      } else {
            echo json_encode(['message' => 'User not found']);
      }
}
