<?php 
    require_once 'conect.php';

    function contarChamadosPorStatus() {
        global $con;
    
        $sql = 'SELECT nm_status, COUNT(*) AS total 
                FROM tb_chamado 
                INNER JOIN tb_st_chamado ON st_chamado = cd_st_chamado
                WHERE id_unidade = "' . $_SESSION['unidade'] . '" 
                GROUP BY nm_status';
    
        $res = $con->query($sql);
    
        if ($res) {
            $dados = [];
            while ($row = $res->fetch_assoc()) {
                $dados[$row['nm_status']] = $row['total'];
            }
            return $dados;
        } else {
            return "Erro na consulta: " . $con->error;
        }
    }
    
?>