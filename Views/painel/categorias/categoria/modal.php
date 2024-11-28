<div class="modal fade" id="addcategoria" data-backdrop="static">
    <div class="modal-dialog modal-md div modal-content">
        <form method="post" enctype="multipart/form-data" class="form-group">
            <div class="modal-header">
                Criar Categoria
            </div>
            <div class="modal-body">
                <input type="text" name="nome" class="form-control" placeholder="Nome da categoria" maxlength="15" required></input>
                <br>
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

<div class="modal fade" id="deletar" data-backdrop="static">
    <div class="modal-dialog modal-md div modal-content">
        <form method="post" enctype="multipart/form-data" class="form-group">
            <div class="modal-header">
                DESEJA MESMO DELETAR?
            </div>
            <div class="modal-body">
                <input type="hidden" name="cd" id="cd">
                <br>
                <label for="nome" class="">Nome da categoria</label>
                <input type="text" name="nome" id="nome" class="form-control" rows="5" readonly></input>
                <br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">
                    Fechar
                </button>
                <input type="submit" class="btn btn-danger text-white" name="action" value="Deletar">
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editar" data-backdrop="static">
    <div class="modal-dialog modal-md div modal-content">
        <form method="post" enctype="multipart/form-data" class="form-group">
            <div class="modal-header">
                EDITAR CATEGORIA
            </div>
            <div class="modal-body">
                <input type="hidden" name="cd" id="cd">
                <br>
                <label for="nome" class="">Nome da categoria</label>
                <input type="text" name="nome" id="nome" class="form-control" rows="5" required></input>
                <br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">
                    Fechar
                </button>
                <input type="submit" class="btn btn-primary text-white" name="action" value="Editar">
            </div>
        </form>
    </div>
</div>