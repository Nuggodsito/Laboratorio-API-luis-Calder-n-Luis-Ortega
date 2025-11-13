<?php
require_once '../config/database.php';
require_once 'Product.php';

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function create() {
        $data = json_decode(file_get_contents("php://input"));

        if (!empty($data->nombre) && !empty($data->descripcion) && isset($data->precio)) {
            $this->product->nombre = $data->nombre;
            $this->product->descripcion = $data->descripcion;
            $this->product->precio = $data->precio;

            if ($this->product->create()) {
                http_response_code(201);
                echo json_encode(["message" => "Producto creado exitosamente."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "No se pudo crear el producto."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Datos incompletos. Se requiere nombre, descripcion y precio."]);
        }
    }

    public function read() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if ($id) {
            if ($this->product->readOne($id)) {
                $product_arr = [
                    "id" => $this->product->id,
                    "nombre" => $this->product->nombre,
                    "descripcion" => $this->product->descripcion,
                    "precio" => $this->product->precio
                ];
                http_response_code(200);
                echo json_encode($product_arr);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Producto no encontrado."]);
            }
        } else {
            $stmt = $this->product->read();
            $num = $stmt->rowCount();

            if ($num > 0) {
                $products_arr = [];
                $products_arr["productos"] = [];

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $product_item = [
                        "id" => $row['id'],
                        "nombre" => $row['nombre'],
                        "descripcion" => $row['descripcion'],
                        "precio" => $row['precio']
                    ];
                    array_push($products_arr["productos"], $product_item);
                }

                http_response_code(200);
                echo json_encode($products_arr);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "No se encontraron productos."]);
            }
        }
    }

    public function update() {
        $data = json_decode(file_get_contents("php://input"));

        if (!empty($data->id)) {
            $this->product->id = $data->id;
            
            if ($this->product->readOne($data->id)) {
                $this->product->nombre = $data->nombre ?? $this->product->nombre;
                $this->product->descripcion = $data->descripcion ?? $this->product->descripcion;
                $this->product->precio = $data->precio ?? $this->product->precio;

                if ($this->product->update()) {
                    http_response_code(200);
                    echo json_encode(["message" => "Producto actualizado exitosamente."]);
                } else {
                    http_response_code(503);
                    echo json_encode(["message" => "No se pudo actualizar el producto."]);
                }
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Producto no encontrado."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Se requiere el ID del producto."]);
        }
    }

    public function delete() {
        $data = json_decode(file_get_contents("php://input"));

        if (!empty($data->id)) {
            $this->product->id = $data->id;

            if ($this->product->delete()) {
                http_response_code(200);
                echo json_encode(["message" => "Producto eliminado exitosamente."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "No se pudo eliminar el producto."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Se requiere el ID del producto."]);
        }
    }
}
?>