<div class="modal fade" id="editar" data-backdrop="static">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" class="form-group">
                <div class="modal-header">
                    EDITAR USUARIO
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cd" id="cd">
                    <br>
                    <label for="nome" class="">Nome do Usuario</label>
                    <input type="text" name="nome" id="nome" class="form-control" rows="5" readonly></input>
                    <br>
                    <label for="nome" class="">Data de entrada</label>
                    <input type="text" name="data" id="data" class="form-control" rows="5" readonly></input>
                    <br>
                    <label for="cargo" class="">Cargo na conexao</label>
                    <select name="cargo" id="cargo" class="form-control" aria-label="Default select example">
                        <option value="4">comum</option>
                        <option value="3">suporte</option>
                        <option value="2">admin</option>
                    </select>
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
</div>

<div class="modal fade" id="deletar" data-backdrop="static">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" class="form-group">
                <div class="modal-header">
                    DELETAR USUARIO
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cd" id="cd">
                    <br>
                    <label for="nome" class="">Nome do Usuario</label>
                    <input type="text" name="nome" id="nome" class="form-control" rows="5" readonly></input>
                    <br>
                    <label for="nome" class="">Data de entrada</label>
                    <input type="text" name="data" id="data" class="form-control" rows="5" readonly></input>
                    <br>
                    <label for="nome" class="">Cargo do usuario</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" rows="5" readonly></input>
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
</div>