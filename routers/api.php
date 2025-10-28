<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/VivoController.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db = (new Database())->getConnection();
$controller = new VivoController($db);

$request = $_SERVER["REQUEST_METHOD"];
$path = $_SERVER["REQUEST_URI"];

if (strpos($path, "/vivo/all") !== false && $request == "GET") {
    $controller->getAll();
} elseif (strpos($path, "/vivo/arequipa") !== false && $request == "GET") {
    $controller->getArequipa();
} elseif (strpos($path, "/vivo/provincia") !== false && $request == "GET") {
    $controller->getProvincia();
} elseif (strpos($path, "/vivo/crear") !== false && $request == "POST") {
    $controller->create();
}elseif (strpos($path, "/vivo/actualizar") !== false && $request == "PUT") {
    $controller->update();
} elseif (preg_match("/\/vivo\/borrar\/(\d+)/", $path, $matches) && $request == "DELETE") {
    $controller->delete($matches[1]);
}else {
    http_response_code(404);
    echo json_encode(["error" => "Ruta no encontrada"]);
}
?>
