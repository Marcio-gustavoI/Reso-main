<?php  

require_once 'conect.php';

    function CriarCategoria($nomecat,$id,$conexao,$pagina){
        $sql = 'INSERT INTO tb_equipamento_categoria (categoria_nm, id_usuario, id_unidade) VALUES 
                (?,?,?)';

        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('sss',$nomecat,$id,$conexao);

        $res = $stmt->execute();

        if($res){
            Confirma("Categoria criada com sucesso!",$pagina);
        }else{
            Erro("Não foi possivel criar a categoria!");
        }
    }

    function ListarCategorias($msg) {
        $sql = 'SELECT u.cd_usuario, u.nm_usuario, e.cd_categoria, e.categoria_nm, DATE_FORMAT(e.dt_categoria, "%d/%m/%Y") as dt_categoria, e.id_usuario, e.id_unidade 
                FROM tb_equipamento_categoria e
                INNER JOIN tb_usuario u 
                ON e.id_usuario = cd_usuario
                WHERE e.st_ativo = 1 AND e.id_unidade ='.$_SESSION['unidade'];

        $res = $GLOBALS['con']->query($sql);

        if ($res->num_rows > 0) {
            return $res;
        } else {
            echo $msg;
        }
    }

    function EditarCategoria($id, $nome,$unidade, $pagina){
        $sql = 'UPDATE tb_equipamento_categoria set categoria_nm = ? where cd_categoria = ? and id_unidade = ?';

        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('sii', $nome, $id, $unidade);

        $res = $stmt->execute();

        
        if($res){
            Confirma("Categoria editada com sucesso!",$pagina);
        }else{
            Erro("Não foi possivel editar a categoria!");
        }
    }

    function DeletarCategoria($cd_catego, $pagina) {
        $sql = 'UPDATE tb_equipamento_categoria SET st_ativo = 0, dt_exclusao = current_timestamp() WHERE
                id_unidade = ? AND cd_categoria = ?';

        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('ii',$_SESSION['unidade'],$cd_catego);

        $res = $stmt->execute();

        if($res){
            Confirma("Categoria deletada com sucesso!",$pagina);
        }else{
            Erro("Não foi possivel deletar a categoria!");
        }
    }
?>