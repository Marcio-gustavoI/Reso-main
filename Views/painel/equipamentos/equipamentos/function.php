<?php
require_once 'conect.php';

function ListarEquipamentos($categoria = null, $sala = null) {
    $sql = 'SELECT 
                e.cd_equipamento, 
                e.nm_equipamento, 
                e.ds_equipamento, 
                DATE_FORMAT(e.dt_equipamento, "%d/%m/%Y") as dt_equipamento, 
                e.st_equipamento, 
                t.nm_status,
                e.id_sala, 
                e.id_usuario,
                e.id_categoria, 
                u.nm_usuario, 
                c.categoria_nm, 
                s.nm_sala
            FROM tb_equipamento e
            INNER JOIN tb_st_equipamento t ON e.st_equipamento = t.cd_st_equipamento
            LEFT JOIN tb_usuario u ON e.id_usuario = u.cd_usuario
            LEFT JOIN tb_equipamento_categoria c ON e.id_categoria = c.cd_categoria
            LEFT JOIN tb_sala s ON e.id_sala = s.cd_sala
            WHERE e.st_ativo = 1 AND  e.id_unidade = ? ';

    $params = [$_SESSION['unidade']];
    $types = 'i';

    if ($categoria) {
        $sql .= ' AND e.id_categoria = ?';
        $params[] = $categoria;
        $types .= 'i';
    }
    if ($sala) {
        $sql .= ' AND e.id_sala = ?';
        $params[] = $sala;
        $types .= 'i';
    }

    $stmt = $GLOBALS['con']->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && $res->num_rows > 0) {
        return $res->fetch_all(MYSQLI_ASSOC);
    } else {
        return []; 
    }
}

function CriarEquipamento($nome, $desc, $categoria, $usuario, $unidade, $pagina) {
    $sqlSala = 'SELECT cd_sala FROM tb_sala WHERE nm_sala = "ESTOQUE" LIMIT 1';
    $stmtSala = $GLOBALS['con']->prepare($sqlSala);
    $stmtSala->execute();
    $resultado = $stmtSala->get_result();

    if ($resultado->num_rows === 0) {
        Erro("A sala 'ESTOQUE' não existe. Crie a sala estoque antes de adicionar equipamentos.");
        return;
    }

    $salaEstoque = $resultado->fetch_assoc();
    $idSalaEstoque = $salaEstoque['cd_sala'];

    $sql = 'INSERT INTO tb_equipamento (nm_equipamento, ds_equipamento, id_sala, id_categoria, id_usuario, id_unidade, st_equipamento)
            VALUES (?, ?, ?, ?, ?, ?, 3)';
    
    $stmt = $GLOBALS['con']->prepare($sql);
    $stmt->bind_param('ssiiii', $nome, $desc, $idSalaEstoque, $categoria, $usuario, $unidade);

    $res = $stmt->execute();

    if ($res) {
        Confirma("Equipamento criado com sucesso na sala 'ESTOQUE'!", $pagina);
    } else {
        Erro("Não foi possível criar o Equipamento!");
    }
}


function EditarEquipamento($cd_equipamento, $nome, $desc, $status, $sala, $categoria, $usuario, $unidade, $pagina) {
    $sql = 'UPDATE tb_equipamento SET nm_equipamento = ?, ds_equipamento = ?, st_equipamento = ?, id_sala = ?, id_categoria = ?, id_usuario = ?
            WHERE id_unidade = ? AND cd_equipamento = ?';

    $stmt = $GLOBALS['con']->prepare($sql);
    $stmt->bind_param('sssiiiii', $nome, $desc, $status, $sala, $categoria, $usuario, $unidade, $cd_equipamento);

    $res = $stmt->execute();

    if ($res) {
        Confirma("Equipamento editado com sucesso!", $pagina);
    } else {
        Erro("Não foi possível editar o Equipamento!");
    }
}

function ExcluirEquipamento($cd_equipamento, $pagina) {
    $sql = 'UPDATE tb_equipamento SET st_ativo = 0, dt_exclusao = current_timestamp()
    WHERE id_unidade = ? AND cd_equipamento = ?';

$stmt = $GLOBALS['con']->prepare($sql);
$stmt->bind_param('ii',$_SESSION['unidade'], $cd_equipamento);

$res = $stmt->execute();

if ($res) {
Confirma("Equipamento deletado com sucesso!", $pagina);
} else {
Erro("Não foi possível editar o Equipamento!");
}

}
?>