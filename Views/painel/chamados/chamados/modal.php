<?php
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
                WHERE e.st_equipamento = 1 AND e.st_ativo = 1 AND  e.id_unidade = ? ';
    
        $stmt = $GLOBALS['con']->prepare($sql);
        $stmt->bind_param('i', $_SESSION['unidade']);
        $stmt->execute();
        $res = $stmt->get_result();
    
        if ($res && $res->num_rows > 0) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; 
        }
    }
?>

<div class="modal fade" id="abrirChamado" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post" class="form-group">
                <div class="modal-header">
                    <h5 class="modal-title">Abrir Chamado</h5>
                </div>
                <div class="modal-body">
                    <input type="text" name="titulo" class="form-control mb-2" placeholder="Título do Chamado" required>
                    <textarea name="descricao" class="form-control mb-2" placeholder="Descrição do Problema" required
                        rows="3"></textarea>
                    <?php $equipamentos = ListarEquipamentos();
                        if($equipamentos){
                    ?>
                    <select name="equipamento" class="form-control mb-2">
                        <option value="" selected>Selecione um Equipamento (opcional)</option>
                        <?php
                            
                            foreach ($equipamentos as $equipamento) {
                        ?>
                        <option value="<?= $equipamento['cd_equipamento'] ?>"><?= $equipamento['nm_equipamento'] ?>
                        </option>
                        <?php }?>
                    </select>
                    <?php }?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" name="action" value="Abrir">Abrir Chamado</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalAndamentoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAndamentoLabel">Editar Chamado</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Título</strong></label>
                        <input type="text" id="Titulo" class="form-control" name="titulo">
                    </div>
                    <div class="form-group">
                        <label><strong>Descrição</strong></label>
                        <textarea id="Descricao" class="form-control" name="descricao" rows="3"></textarea>
                    </div>
                    <?php $equipamentos = ListarEquipamentos();
                        if($equipamentos){
                    ?>
                    <div class="form-group">
                        <label><strong>Equipamentos</strong></label>
                        <select name="Equipamento" id="Equipamento" class="form-control mb-2">
                            <option value="" selected>Selecione um Equipamento (opcional)</option>
                            <?php
                            
                            foreach ($equipamentos as $equipamento) {
                        ?>
                            <option value="<?= $equipamento['cd_equipamento'] ?>"><?= $equipamento['nm_equipamento'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label><strong>Status</strong></label>
                        <input type="text" id="Status" class="form-control" name="status" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Data de Abertura</strong></label>
                        <input type="text" id="Abertura" class="form-control" name="abertura" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Aberto por:</strong></label>
                        <input type="text" id="Usuario" class="form-control" name="usuario" readonly>
                    </div>
                    <input type="hidden" name="cd" id="cd">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="action" value="Editar">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAndamento" tabindex="-1" role="dialog" aria-labelledby="modalAndamentoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAndamentoLabel">Atribuir Andamento</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Título</strong></label>
                        <input type="text" id="Titulo" class="form-control" name="titulo" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Descrição</strong></label>
                        <textarea id="Descricao" class="form-control" name="descricao" rows="3" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label><strong>Equipamento</strong></label>
                        <input type="text" id="Equipamento" class="form-control" name="equipamento" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Status</strong></label>
                        <input type="text" id="Status" class="form-control" name="status" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Data de Abertura</strong></label>
                        <input type="text" id="Abertura" class="form-control" name="abertura" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Aberto por:</strong></label>
                        <input type="text" id="Usuario" class="form-control" name="usuario" readonly>
                    </div>
                    <input type="hidden" name="cd" id="cd">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning" name="action" value="EmAndamento">Confirmar
                        Andamento</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConclusao" tabindex="-1" role="dialog" aria-labelledby="modalConclusaoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalConclusaoLabel">Concluir Chamado</h5>
                </div>
                <div class="modal-body">
                    <input type="text" name="titulo" class="form-control mb-2" id="titulo" readonly>
                    <label for="recado"><strong>Deixe um feedback:</strong></label>
                    <textarea id="recado" class="form-control" name="recado" rows="3" required></textarea>
                    <input type="hidden" name="cd" id="cd">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="action" value="ConcluirChamado">Concluir
                        Chamado</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deletar" tabindex="-1" role="dialog" aria-labelledby="deletarLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletarLabel">Confirmar Deleção</h5>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza que deseja deletar este chamado?</p>
                    <input type="hidden" name="cd" id="cd">
                    <input type="text" name="titulo" id="titulo" class="form-control" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="action" value="DeletarChamado">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="modalAndamentoLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAndamentoLabel">Ver Mais</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Título</strong></label>
                        <input type="text" id="Titulo" class="form-control" name="titulo" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Descrição</strong></label>
                        <textarea id="Descricao" class="form-control" name="descricao" rows="3" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label><strong>Equipamento</strong></label>
                        <input type="text" id="Equipamento" class="form-control" name="equipamento" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Status</strong></label>
                        <input type="text" id="Status" class="form-control" name="status" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Data de Abertura</strong></label>
                        <input type="text" id="Abertura" class="form-control" name="abertura" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Data de fechamento</strong></label>
                        <input type="text" id="fechamento" class="form-control" name="abertura" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Aberto por:</strong></label>
                        <input type="text" id="Usuario" class="form-control" name="usuario" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Acompanhado por:</strong></label>
                        <input type="text" id="final" class="form-control" name="final" readonly>
                    </div>
                    <div class="form-group">
                        <label><strong>Feedback:</strong></label>
                        <textarea class="form-control" name="feedback" id="feedback" rows="3" readonly></textarea>
                    </div>
                    <input type="hidden" name="cd" id="cd">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                </div>
            </form>
        </div>
    </div>
</div>