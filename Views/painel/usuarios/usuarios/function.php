<?php

require_once 'conect.php';

function ListarUsuarios()
{
    $sql = 'SELECT u.cd_usuario, u.nm_usuario, u.nm_email, DATE_FORMAT(un.dt_entrada, "%d/%m/%Y") as dt_entrada, un.id_cargo, c.nm_cargo as cargo_usuario, un.id_usuario 
            FROM tb_usuario u
            INNER JOIN tb_usuario_unidade un
            ON un.id_usuario = u.cd_usuario
            INNER JOIN tb_cargo_unidade c ON un.id_cargo = c.cd_cargo
            WHERE un.st_ativo = 1 AND un.id_unidade =' . $_SESSION['unidade'];

    $res = $GLOBALS['con']->query($sql);

    if ($res->num_rows > 0) {
        return $res;
    } else {
        echo "<h3 class='mx-auto text-white mt-3'>Sem usuarios na sua unidade!</h3>";
    }
}


function EditarUsuario($id, $cargo, $unidade, $pagina)
{
    $sql = 'UPDATE tb_usuario_unidade SET id_cargo = ? where id_usuario = ? and id_unidade = ?';

    $stmt = $GLOBALS['con']->prepare($sql);
    $stmt->bind_param('sii', $cargo, $id, $unidade); 

    $res = $stmt->execute();

    if ($res) {
        Confirma("Editado com sucesso!", $pagina);
    } else {
        Erro("Não foi possível editar!");
    }
}

function ExcluirUsuario($id, $unidade, $pagina){
   $sql = 'UPDATE tb_usuario_unidade SET st_ativo = 0, dt_exclusao = current_timestamp() WHERE id_unidade = ? AND id_usuario = ?';

   $stmt= $GLOBALS['con']->prepare($sql);
   $stmt->bind_param('ii',$unidade,$id);
   $res = $stmt->execute();

    if ($res) {
    Confirma("Usuario deletado com sucesso!", $pagina);
    } else {
        Erro("Não foi possível deletar!");
    }
}