<?php
    function BuscarporId(){
        global $con;
        $sql = 'SELECT cd_usuario, nm_usuario, url_imagem_perfil, nm_email, nr_telefone, dt_nascimento, nm_real FROM tb_usuario WHERE cd_usuario = ?';
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i',$_SESSION['id']);
        $stmt->execute();

        $result = $stmt->get_result();

        $resultado = [];
        while ($row = $result->fetch_assoc()) {
            $resultado[] = $row;
        }
    
        return $resultado;
    }

    function Editar($nmReal,$dtNascimento,$nrTelefone,$id,$pagina){
        global $con;
            $sql = 'UPDATE tb_usuario SET nr_telefone = ?, dt_nascimento = ?, nm_real = ? WHERE cd_usuario = ?';

            $stmt = $con->prepare($sql);
            $stmt->bind_param('sssi',$nrTelefone,$dtNascimento,$nmReal,$id);
            $res = $stmt->execute();

            if($res){
                Confirma("Usuario editado com sucesso!",$pagina);
            }else{
                Erro("Não foi possivel editar suas informações!");
            }


    }

    function EditarImagem($url,$id,$pagina){
        global $con;

        $sql = 'SELECT url_imagem_perfil FROM tb_usuario WHERE cd_usuario = ?';
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $r = $result->fetch_assoc();
        $stmt->close();
    
        if ($r && !empty($r['url_imagem_perfil'])) {
            $dir = "./assets/img/PerfilImgs/" . $r['url_imagem_perfil'];
            
            if (file_exists($dir)) {
                if (!unlink($dir)) {
                    error_log("Could not delete file: " . $dir);
                }
            }
        }
        $sql = 'UPDATE tb_usuario SET url_imagem_perfil = ? WHERE cd_usuario = ?';

        $stmt = $con->prepare($sql);
        $stmt->bind_param('si',$url,$id);
        $res = $stmt->execute();

        if($res){
            Confirma("Foto de perfil editada com sucesso!",$pagina);
        }else{
            Erro("Não foi possivel editar sua foto!");
        }

    }
?>