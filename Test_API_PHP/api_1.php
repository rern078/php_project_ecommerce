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
            if (isset($input['id'])) {
                  headleGetUser($pdo, $input['id']);
            } else {
                  headleGetEmployee($pdo);
            }
            break;
      case 'POST':
            if (isset($input['resource']) && $input['resource'] === 'users') {
                  handlePostUser($pdo, $input);
            } elseif (isset($input['resource']) && $input['resource'] === 'employee') {
                  headlePostEmployee($pdo, $input);
            } else {
                  sendResponse(400, 'Invalid resource');
            }
            break;
      case 'PUT':
            if (isset($input['resource']) && $input['resource'] === 'users' && isset($input['id'])) {
                  handlePutUser($pdo, $input);
            } elseif (isset($input['resource']) && $input['resource'] === 'employee' && isset($input['id'])) {
                  headlePutEmployee($pdo, $input);
            } else {
                  sendResponse(400, 'Invalid resource or id');
            }
            break;
      case 'DELETE':
            if (isset($input['resource']) && $input['resource'] === 'users' && isset($input['id'])) {
                  handleDeleteUser($pdo, $input);
            } elseif (isset($input['resource']) && $input['resource'] === 'employee' && isset($input['id'])) {
                  headleDeleteEmployee($pdo, $input);
            } else {
                  sendResponse(400, 'Invalid resource or id');
            }
            break;
}

function headleGetUser($pdo)
{
      $sql = "SELECT * FROM users";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($result);
}
function handlePostUser($pdo, $input)
{
      $sql = "INSERT INTO users (username, email, phone) VALUES (:username, :email, :phone)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['username' => $input['username'], 'email' => $input['email'], 'phone' => $input['phone']]);
      echo json_encode(['message' => 'User created successfully']);
}
function handlePutUser($pdo, $input)
{
      $sql = "UPDATE users SET username = :username, email = :email, phone = :phone WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['username' => $input['username'], 'email' => $input['email'], 'phone' => $input['phone'], 'id' => $input['id']]);
      echo json_encode(['message' => 'User updated successfully']);
}
function handleDeleteUser($pdo, $input)
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

// ***************** employee ******************

function headleGetEmployee($pdo)
{
      $sql = "SELECT * FROM employee";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($result);
}
function headlePostEmployee($pdo, $input)
{
      $sql = "INSERT INTO employee (em_name, em_email, em_phone) VALUES (:em_name, :em_email, :em_phone)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['em_name' => $input['em_name'], 'em_email' => $input['em_email'], 'em_phone' => $input['em_phone']]);
      echo json_encode(['message' => 'Employee created successfully']);
}
function headlePutEmployee($pdo, $input)
{
      $sql = "UPDATE employee SET em_name = :em_name, em_email = :em_email, em_phone = :em_phone WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['em_name' => $input['em_name'], 'em_email' => $input['em_email'], 'em_phone' => $input['em_phone'], 'id' => $input['id']]);
      echo json_encode(['message' => 'Employee updated successfully']);
}
function headleDeleteEmployee($pdo, $input)
{
      $sql = "DELETE FROM employee WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id' => $input['id']]);
      if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'Employee deleted successfully']);
      } else {
            echo json_encode(['message' => 'Employee not found']);
      }
}
