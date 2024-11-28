<?php
     include_once $_SERVER['DOCUMENT_ROOT'] . '/Reso/Views/painel/salas/salas/function.php';
     include_once $_SERVER['DOCUMENT_ROOT'] . '/Reso/Views/painel/categorias/categoria/function.php';
?>

<div class="modal fade" id="addequipamento" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post" class="form-group">
                <div class="modal-header">
                    <h5 class="modal-title">Criar Equipamento</h5>
                </div>
                <div class="modal-body">
                    <input type="text" name="nome" class="form-control" placeholder="Nome do Equipamento" required>
                    <br>
                    <textarea name="desc" class="form-control" placeholder="Descrição do Equipamento" required
                        rows="2"></textarea>
                    <br>
                    <?php
                            $categorias = ListarCategorias("<input type='text' class='form-control' placeholder='Cadastre categorias, elas serão exibidas aqui' readonly>");
                            if($categorias->num_rows>0){
                    ?>
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="" selected>Selecione uma categoria</option>
                        <?php 
                            if($categorias){
                                foreach($categorias as $index => $l){
                                    $selected = ($l['cd_categoria'] == $categoriaSelecionada) ? 'selected' : '';
                        ?>
                        <option value="<?= $l['cd_categoria']?>" <?= $selected ?>><?=$l['categoria_nm']?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <?php }?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">
                        Fechar
                    </button>
                    <input type="submit" class="btn btn-success text-white" name="action" value="Criar">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post" class="form-group">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Equipamento</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cd" id="cd">
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Equipamento"
                        required>
                    <br>
                    <input type="text" name="desc" id="desc" class="form-control" placeholder="Descrição do Equipamento"
                        required>
                    <br>
                    <select name="sala" id="sala" class="form-control">
                        <option value="" selected>Selecione uma Sala</option>
                        <?php
                            $salas = ListarSalas();

                            if($salas){
                                foreach($salas as $index => $l){
                        ?>
                        <option value="<?= $l['cd_sala']?>"><?=$l['nm_sala']?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <br>
                    <?php
                            $categorias = ListarCategorias("<input type='text' class='form-control' placeholder='Cadastre categorias, elas serão exibidas aqui' readonly>");
                            if($categorias->num_rows>0){
                    ?>
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="" selected>Selecione uma categoria</option>
                        <?php 
                            if($categorias){
                                foreach($categorias as $index => $l){
                        ?>
                        <option value="<?= $l['cd_categoria']?>"><?=$l['categoria_nm']?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <?php }?>
                    <br>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Ativo</option>
                        <option value="2">Manuntenção</option>
                        <option value="3">Desativado</option>
                    </select>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" name="action" value="Editar">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ver" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post" class="form-group">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes Equipamento</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cd" id="cd">
                    <label for="nome">Nome do Equipamento:</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do equipamento"
                        readonly>
                    <br>
                    <label for="desc">Descrição do Equipamento:</label>
                    <Textarea name="desc" id="desc" class="form-control" rows="3" placeholder="Descrição equipamento" readonly="readonly"></Textarea>
                    <br>
                    <label for="desc">Localização</label>
                    <input type="text" name="sala" id="sala" class="form-control" placeholder="Sala equipamento" readonly>
                    <br>
                    <label for="desc">Categoria do equipamento</label>
                    <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Categoria equipamento" readonly>
                    <br>
                    <label for="desc">Status do equipamento</label>
                    <input type="text" name="status" id="status" class="form-control" placeholder="Status equipamento" readonly>
                    <br>
                    <label for="desc">Criado por:</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Criado por" readonly>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deletar" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Equipamento</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cd" id="cd">
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Equipamento"
                        readonly>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-danger text-white" name="action" value="Deletar">
                </div>
            </form>
        </div>
    </div>
</div>
