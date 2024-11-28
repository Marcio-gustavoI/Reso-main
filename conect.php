<?php
if (!defined('ROUTING_ACCESS')) {
    http_response_code(403);
    die('<h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Acesso direto não permitido</h1>');
}
    $host = $_ENV['dbhost'];
    $user = $_ENV['dbuser'];
    $pass = $_ENV['dbpassword'];
    $base = $_ENV['dbname'];

    try {
        $con = new mysqli($host, $user, $pass, $base);
        
        if ($con->connect_error) {
            throw new Exception("Erro na conexão: " . $con->connect_error);
        }
        
        $con->set_charset("utf8");
        
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        exit();
    }
?>