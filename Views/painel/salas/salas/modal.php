<div class="modal fade" id="addsala" data-backdrop="static">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" class="form-group">
                <div class="modal-header">
                    CRIAR SALA
                </div>
                <div class="modal-body">
                    <input type="text" name="nome" class="form-control" rows="5" placeholder="Nome da sala"
                        required></input>
                    <br>
                    <input type="text" name="desc" class="form-control" rows="5" placeholder="Descrição da sala"
                        required></input>
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
</div>

<div class="modal fade" id="deletar" data-backdrop="static">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" class="form-group">
                <div class="modal-header">
                    DESEJA MESMO DELETAR?
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cd" id="cd">
                    <br>
                    <label for="nome" class="">Nome da sala</label>
                    <input type="text" name="nome" id="nome" class="form-control" readonly>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Fechar
                    </button>
                    <input type="submit" class="btn btn-danger text-white" name="action" value="Deletar">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" data-backdrop="static">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" class="form-group">
                <div class="modal-header">
                    EDITAR SALA
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cd" id="cd">
                    <br>
                    <label for="nome" class="">Nome da sala</label>
                    <input type="text" name="nome" id="nome" class="form-control" required></input>
                    <br>
                    <label for="desc" class="">Descrição da sala</label>
                    <input type="text" name="desc" id="desc" class="form-control" required></input>
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
</div>
<div class="modal fade" id="ver" data-backdrop="static">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" class="form-group">
                <div class="modal-header">
                    VER MAIS
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cd" id="cd">
                    <br>
                    <label for="nome" class="">Nome da sala</label>
                    <input type="text" name="nome" id="nome" class="form-control" readonly></input>
                    <br>
                    <label for="desc" class="">Descrição da sala</label>
                    <input type="text" name="desc" id="desc" class="form-control" readonly></input>
                    <br>
                    <label for="desc" class="">CRIADO POR</label>
                    <input type="text" name="criado" id="criado" class="form-control" readonly></input>
                    <br>
                    <label for="desc" class="">DATA</label>
                    <input type="text" name="data" id="data" class="form-control" readonly></input>
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
</div>