<?php
require_once __DIR__ . '/routers/api.php';
header("Access-Control-Allow-Origin: *"); // Permitir cualquier origen (puedes restringirlo si deseas)
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

// --- Manejo del preflight (OPTIONS) ---
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

?>

