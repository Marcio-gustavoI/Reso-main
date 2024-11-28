<?php
define('ROUTING_ACCESS', true);
session_start();
require_once './vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(dirname(__FILE__, 1));
$dotenv->load();

require_once 'routes.php';
require_once 'conect.php';

$route = $_GET['route'] ?? '/';

if (isset($routes[$route])) {
    call_user_func($routes[$route]);
} else {
    http_response_code(404);
    echo "Página não encontrada.";
}