<?php
require_once '../src/ProductController.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
$productController = new ProductController();

switch ($method) {
    case 'POST':
        $productController->create();
        break;

    case 'GET':
        $productController->read();
        break;

    case 'PUT':
        $productController->update();
        break;

    case 'DELETE':
        $productController->delete();
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Método no permitido."]);
        break;
}
?>