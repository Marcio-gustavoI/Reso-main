<?php
header('Content-Type: application/json');
include_once 'conect.php';

$id_chamado = $_GET['idChamado'];
$ultimo_id = $_GET['ultimo_id'];

$resposta = ['mensagens' => [], 'status' => false];

if ($id_chamado) {
    $sql = 'SELECT cd_mensagem AS id_mensagem, url_imagem_perfil, mensagem, id_usuario AS ID, nm_usuario AS remetente, DATE_FORMAT(dt_envio, "%d/%m %H:%i") AS data_envio 
            FROM tb_chat 
            INNER JOIN tb_usuario ON id_usuario = cd_usuario 
            WHERE id_chamado = ? AND cd_mensagem > ? 
            ORDER BY cd_mensagem ASC';

    $stmt = $GLOBALS['con']->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('ii', $id_chamado, $ultimo_id);
        $stmt->execute();

        $res = $stmt->get_result();
        while ($linha = $res->fetch_assoc()) {
            $resposta['mensagens'][] = $linha;
        }

        $resposta['status'] = true;
        $stmt->close();
    }
}

echo json_encode($resposta);