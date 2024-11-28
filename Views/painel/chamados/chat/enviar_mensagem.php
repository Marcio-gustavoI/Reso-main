<?php
header('Content-Type: application/json');
include_once 'conect.php';

$id_usuario = $_SESSION['id'];
$id_chamado = $_POST['id_chamado'];
$mensagem = $_POST['mensagem'];

$resposta = ['status' => false, 'mensagem' => 'Erro ao enviar'];

if ($id_chamado && $mensagem && $id_usuario) {
    $sql = 'INSERT INTO tb_chat (id_chamado, id_usuario, mensagem) VALUES (?, ?, ?)';
    
    $stmt = $GLOBALS['con']->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('iis', $id_chamado, $id_usuario, $mensagem);
        $res = $stmt->execute();
        if ($res) {
            $resposta = [
                'status' => true,
                'mensagem' => 'Mensagem enviada com sucesso',
                'id_mensagem' => $GLOBALS['con']->insert_id
            ];
        }
        $stmt->close();
    }
}

echo json_encode($resposta);