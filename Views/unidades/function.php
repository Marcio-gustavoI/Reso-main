<?php

require_once 'dialog.php';

function CriarUnidade($nome, $criador, $pagina) {
    $GLOBALS['con']->begin_transaction();
    
    try {
        $idUnidade = inserirUnidade($nome);
        
        vincularUsuarioUnidade($criador, $idUnidade);
        
        criarSalaEstoque($criador, $idUnidade);
        
        $GLOBALS['con']->commit();
        Confirma("Unidade criada com sucesso!", $pagina);
        
    } catch (Exception $e) {
        $GLOBALS['con']->rollback();
        Erro($e->getMessage());
    }
}

function inserirUnidade($nome) {
    $codigo = time() . $nome;
    
    $sql = 'INSERT INTO tb_unidade (nm_unidade, codigo_unidade) VALUES (?, SHA2(?, 256))';
    $stmt = $GLOBALS['con']->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Erro ao preparar a query de criação da unidade.");
    }
    
    $stmt->bind_param('ss', $nome, $codigo);
    
    if (!$stmt->execute()) {
        throw new Exception("Erro ao criar a unidade: " . $stmt->error);
    }
    
    $idUnidade = $GLOBALS['con']->insert_id;
    $stmt->close();
    
    if (!$idUnidade) {
        throw new Exception("Erro ao obter o ID da unidade criada.");
    }
    
    return $idUnidade;
}

function vincularUsuarioUnidade($idUsuario, $idUnidade) {
    $cargo = 1;
    
    $sql = 'INSERT INTO tb_usuario_unidade (id_usuario, id_unidade, id_cargo) VALUES (?, ?, ?)';
    $stmt = $GLOBALS['con']->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Erro ao preparar a query de vinculação do usuário.");
    }
    
    $stmt->bind_param('iii', $idUsuario, $idUnidade, $cargo);
    
    if (!$stmt->execute()) {
        throw new Exception("Erro ao vincular usuário à unidade: " . $stmt->error);
    }
    
    $stmt->close();
}

function criarSalaEstoque($idUsuario, $idUnidade) {
    $nomeSala = "ESTOQUE";
    $descSala = "Sala para guardar os equipamentos.";
    $status = 2;
    
    $sql = 'INSERT INTO tb_sala (nm_sala, ds_sala, id_usuario, id_unidade, st_sala) VALUES (?, ?, ?, ?, ?)';
    $stmt = $GLOBALS['con']->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Erro ao preparar a query de criação da sala.");
    }
    
    $stmt->bind_param('ssiii', $nomeSala, $descSala, $idUsuario, $idUnidade, $status);
    
    if (!$stmt->execute()) {
        throw new Exception("Erro ao criar a sala de estoque: " . $stmt->error);
    }
    
    $stmt->close();
}


function Listarunidade() {
    $sql = "SELECT 
        u.nm_unidade,
        u.codigo_unidade,
        DATE_FORMAT(uu.dt_entrada, '%d/%m/%Y') as dt_entrada,
        u.cd_unidade,
        uu.id_cargo,
        uu.id_usuario as id_criador,
        c.nm_cargo as cargo_usuario
    FROM 
        tb_unidade u
        INNER JOIN tb_usuario_unidade uu ON u.cd_unidade = uu.id_unidade
        INNER JOIN tb_cargo_unidade c ON uu.id_cargo = c.cd_cargo
    WHERE 
        uu.st_ativo = 1 AND
        u.st_ativo = 1 AND
        uu.id_usuario = '".$_SESSION['id']."'";

    $res = $GLOBALS['con']->query($sql);

    if ($res && $res->num_rows > 0) {
        return $res->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function DeletarUnidade($cd, $pagina) {
        $sql = 'UPDATE tb_unidade SET st_ativo = 0, dt_exclusao = current_timestamp()
                WHERE cd_unidade = ?';

        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('i',$cd);

        $res = $stmt->execute();

        if($res){
            Confirma("Unidade deletada!", $pagina);
        }else{
            Erro("Não foi possivel deletar unidade!");
        }
    
}
    
    

    function SairUnidade($usuario,$unidade,$pagina){
        $sql='UPDATE tb_usuario_unidade SET st_ativo = 0, dt_exclusao = current_timestamp() where id_usuario="'.$usuario.'" and id_unidade="'.$unidade.'"';

        $res = $GLOBALS['con']->query($sql);

        if($res){
            Confirma("Você saiu desta Unidade!", $pagina);
        }else{
            Erro("Não foi possivel sair da unidade!");
        }
    }

    function EntrarUnidade($usuario, $code, $pagina) {
        
        $conn = $GLOBALS['con'];

        $sql = 'SELECT cd_unidade FROM tb_unidade WHERE codigo_unidade = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $code); 
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
    
        if ($res) {
            $cd_unidade = $res['cd_unidade'];
    
            $sqlCheck = 'SELECT * FROM tb_usuario_unidade WHERE id_usuario = ? AND id_unidade = ?';
            $stmtCheck = $conn->prepare($sqlCheck);
            $stmtCheck->bind_param('ss', $usuario, $cd_unidade);
            $stmtCheck->execute();
            $resCheck = $stmtCheck->get_result();
    
            if ($resCheck->num_rows == 0) { 

                $sqlInsert = 'INSERT INTO tb_usuario_unidade (id_usuario, id_unidade, id_cargo) VALUES (?, ?, ?)';
                $stmtInsert = $conn->prepare($sqlInsert);
                $cargo_usuario = '4';
                $stmtInsert->bind_param('sss', $usuario, $cd_unidade, $cargo_usuario);
    
                if ($stmtInsert->execute()) {
                    Confirma("Unidade adicionada", $pagina);
                } else {
                    Erro("Não foi possível adicionar unidade :(");
                }
            } else {
                Erro("Unidade já existe.");
            }
        } else {
            Erro("Código da unidade inválido.");
        }
    }
    
    function EditarUnidade($cd,$nome,$pagina){
        $sql = 'update tb_unidade set nm_unidade = ? where cd_unidade = ? ';

        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('ss', $nome, $cd);

        $res = $stmt->execute();

        if($res){
            Confirma("Editado com sucesso!", $pagina);
        }else{
            Erro("Não foi possivel editar!");
        }
    }
