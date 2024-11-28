<?php

require_once 'conect.php';


    function ListarSalas(){
        $sql = 'SELECT  u.cd_usuario, u.nm_usuario, s.cd_sala, s.nm_sala, s.ds_sala, DATE_FORMAT(s.dt_sala, "%d/%m/%Y") as dt_sala, s.id_usuario, s.id_unidade FROM tb_sala s 
        INNER JOIN tb_usuario u on s.id_usuario = u.cd_usuario 
        WHERE s.st_ativo=1 AND s.id_unidade ='.$_SESSION['unidade'];

        $res = $GLOBALS['con']->query($sql);
        
        if ($res->num_rows > 0) {
            return $res;
        } else {
            echo "<h3 class='mx-auto text-white'>Cadastre suas Salas, elas serão exibidas aqui!</h3>";
        }
    }

    function CriarSala($nome,$desc,$usuario,$unidade,$pagina){
        $sql = 'INSERT INTO tb_sala (nm_sala, ds_sala, id_usuario, id_unidade, st_sala) VALUES (?, ?, ?, ?, 2)';

        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('ssii',$nome,$desc,$usuario,$unidade);

        $res = $stmt->execute();
        
        if($res){
            Confirma("Sala criada com sucesso!",$pagina);
        }else{
            Erro("Não foi possivel criar a Sala!");
        }
    }

    function EditarSala($cd_sala,$nome,$desc,$usuario,$unidade,$pagina){

        $sql = 'UPDATE tb_sala set nm_sala = ?, ds_sala = ?, id_usuario = ? where id_unidade = ? and cd_sala = ?';

        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('ssiii',$nome,$desc,$usuario,$unidade,$cd_sala);

        $res = $stmt->execute();

        if($res){
            Confirma("Sala editada com sucesso!",$pagina);
        }else{
            Erro("Não foi possivel editar a Sala!");
        }
    }

    function ExcluirSala($cd_sala, $unidade, $pagina) {
        $sql = 'UPDATE tb_sala SET st_ativo = 0 AND dt_exclusao = current_timestamp()
                WHERE id_unidade = ? AND cd_sala = ?';

        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('ii',$unidade,$cd_sala);
        $res = $stmt->execute();

        if($res){
            Confirma("Sala deletada com sucesso!",$pagina);
        }else{
            Erro("Não foi possivel editar a Sala!");
        }
    }
    

    