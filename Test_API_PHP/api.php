<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require 'connection.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

$resource = isset($requestUri[1]) ? $requestUri[1] : null;
$id = isset($requestUri[2]) ? intval($requestUri[2]) : null;

switch ($requestMethod) {
      case 'GET':
            if ($resource == 'products') {
                  if ($id) {
                        getProduct($id);
                  } else {
                        getProducts();
                  }
            } elseif ($resource == 'categories') {
                  if ($id) {
                        getCategory($id);
                  } else {
                        getCategories();
                  }
            } else {
                  sendResponse(404, 'Resource not found');
            }
            break;
      case 'POST':
            if ($resource == 'products') {
                  createProduct();
            } elseif ($resource == 'categories') {
                  createCategory();
            } else {
                  sendResponse(404, 'Resource not found');
            }
      case 'PUT':
            if ($resource == 'products' && $id) {
                  updateProduct($id);
            } elseif ($resource == 'categories' && $id) {
                  updateCategory($id);
            } else {
                  sendResponse(404, 'Resource not found');
            }
            break;
      case 'DELETE':
            if ($resource == 'products' && $id) {
                  deleteProduct($id);
            } elseif ($resource == 'categories' && $id) {
                  deleteCategory($id);
            } else {
                  sendResponse(404, 'Resource not found');
            }
            break;
      default:
            sendResponse(405, 'Method not allowed');
            break;
}

function getProducts()
{
      global $pdo;
      $stmt = $pdo->query('SELECT * FROM products');
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      sendResponse(200, $products);
}
function getProduct($id)
{
      global $pdo;
      $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
      $stmt->execute([$id]);
      $product = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($product) {
            sendResponse(200, $product);
      } else {
            sendResponse(404, 'Product not found');
      }
}
function createProduct()
{
      global $pdo;
      $input = json_decode(file_get_contents('php://input'), true);
      if (isset($input['name']) && isset($input['price']) && isset($input['category_id'])) {
            $stmt = $pdo->prepare('INSERT INTO products (name, category_id, price,description) VALUES (?, ?, ?,?)');
            $stmt->execute([$input['name'], $input['category_id'], $input['price'], $input['description']]);
            sendResponse(201, ['id' => $pdo->lastInsertId(), 'name' => $input['name'], 'category_id' => $input['category_id']]);
            // sendResponse(200, 'Product updated successfully');
      } else {
            sendResponse(400, 'Invalid request');
      }
}
function updateProduct($id)
{
      global $pdo;
      $input = json_decode(file_get_contents('php://input'), true);
      if (isset($input['name']) && isset($input['price']) && isset($input['category_id'])) {
            $stmt = $pdo->prepare('UPDATE products SET name = ?, category_id = ?, price = ?, description = ? WHERE id = ?');
            $stmt->execute([$input['name'], $input['category_id'], $input['price'], $input['description'], $id]);
            sendResponse(200, 'Product updated successfully');
      } else {
            sendResponse(400, 'Invalid request');
      }
}
function deleteProduct($id)
{
      global $pdo;
      $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
      $stmt->execute([$id]);
      sendResponse(200, 'Product deleted successfully');
}
function getCategories()
{
      global $pdo;
      $stmt = $pdo->query('SELECT * FROM categories');
      $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
      sendResponse(200, $categories);
}
function getCategory($id)
{
      global $pdo;
      $stmt = $pdo->prepare('SELECT * FROM categories WHERE id = ?');
      $stmt->execute([$id]);
      $category = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($category) {
            sendResponse(200, $category);
      } else {
            sendResponse(404, 'Category not found');
      }
}
function createCategory()
{
      global $pdo;
      $input = json_decode(file_get_contents('php://input'), true);
      if (isset($input['name'])) {
            $stmt = $pdo->prepare('INSERT INTO categories (name, description) VALUES (?,?)');
            $stmt->execute([$input['name'], $input['description']]);
            sendResponse(201, 'Category created successfully');
      } else {
            sendResponse(400, 'Invalid request');
      }
}
function updateCategory($id)
{
      global $pdo;
      $input = json_decode(file_get_contents('php://input'), true);
      if (isset($input['name'])) {
            $stmt = $pdo->prepare('UPDATE categories SET name = ?, description = ? WHERE id = ?');
            $stmt->execute([$input['name'], $input['description'], $id]);
            sendResponse(200, 'Category updated successfully');
      } else {
            sendResponse(400, 'Invalid request');
      }
}
function deleteCategory($id)
{
      global $pdo;
      $stmt = $pdo->prepare('DELETE FROM categories WHERE id = ?');
      $stmt->execute([$id]);
      sendResponse(200, 'Category deleted successfully');
}
function sendResponse($statusCode, $data)
{
      http_response_code($statusCode);
      echo json_encode($data);
}
