<?php
    require_once 'header.php';
    require_once 'function.php';
    require_once 'modal.php';
    require_once 'script.php';
?>
<style>
.botoes {
    font-size: 1.5rem;
}

@media screen and (max-width: 768px) {

    .table thead {
        display: none;
    }

    .table tbody tr {
        display: block;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        padding: 10px;
    }

    .table tbody td {
        display: block;
        text-align: right;
        padding: 5px;
        position: relative;
    }

    .table tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        text-align: left;
        font-weight: bold;
    }

    .table tbody td.btn-group {
        display: flex;
        justify-content: center;
        gap: 5px;
    }
}
</style>

<body>
    <?php
    require_once 'nav.php';
?>
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="mt-1 col-12 col-sm-6 col-md-2">
                <button class="btn btn-block d-flex flex-row align-items-center justify-content-center"
                    style="background-color:#03305c;" data-toggle="modal" data-target="#addunidade">
                    <span class="text-white">Criar</span>
                </button>
            </div>
            <div class="mt-3 col-12 col-sm-6 col-md-8">
                <h4 class="text-muted text-center">LISTA DE UNIDADES</h4>
            </div>
            <div class="mt-1 col-12 col-sm-6 col-md-2">
                <button class="btn btn-block d-flex flex-row justify-content-center" style="background-color:#03305c;"
                    data-toggle="modal" data-target="#entrarunidade">
                    <span class="text-white">Conectar</span>
                </button>
            </div>
        </div>

        <?php $listar = ListarUnidade();
        if(!empty($listar) && $listar > 0){
    ?>
        <div class="row">
            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="bg-primary text-white text-center">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Data</th>
                                <th scope="col" style="width: 200px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    if ($listar) {
                        foreach ($listar as $index => $l) {
                            ?>
                            <tr class="text-center">
                                <td data-label="Nome"><?php echo $l['nm_unidade']; ?></td>
                                <td data-label="Cargo"><?php echo strtoupper($l['cargo_usuario']); ?></td>
                                <td data-label="Data"><?php echo $l['dt_entrada']; ?></td>
                                <td class="btn-group" data-label="Ações" style="border:none;column-gap:5px;">

                                    <button class="btn btn-success btn-sm ver" data-toggle="modal" data-target="#ver"
                                        title="ver" cd="<?php echo $l['cd_unidade']; ?>"
                                        nome="<?php echo $l['nm_unidade']; ?>"
                                        cargo="<?php echo $l['cargo_usuario']; ?>"
                                        <?php if ($l['cargo_usuario'] == "comum" || $l['cargo_usuario'] == "suporte") { ?>
                                        codigo="Sem permissão para ver o código da conexão" <?php } else { ?>
                                        codigo="<?php echo $l['codigo_unidade']; ?>" <?php } ?>
                                        data="<?php echo $l['dt_entrada']; ?>">
                                        <i class="botoes bi bi-eye-fill"></i>
                                    </button>
                                    <?php if ($l['cargo_usuario'] == "criador") { ?>
                                    <button class="btn btn-primary btn-sm editar" data-toggle="modal"
                                        data-target="#editar" title="editar" cd="<?php echo $l['cd_unidade']; ?>"
                                        nome="<?php echo $l['nm_unidade']; ?>"
                                        cargo="<?php echo $l['cargo_usuario']; ?>"
                                        codigo="<?php echo $l['codigo_unidade']; ?>"
                                        data="<?php echo $l['dt_entrada']; ?>">
                                        <i class="botoes bi bi-pencil-fill"></i>
                                    </button>
                                    <?php } ?>
                                    <?php if ($l['cargo_usuario'] == "criador") { ?>
                                    <button class="btn btn-danger btn-sm deletar" data-toggle="modal"
                                        data-target="#deletar" title="deletar" cd="<?php echo $l['cd_unidade']; ?>"
                                        nome="<?php echo $l['nm_unidade']; ?>"
                                        cargo="<?php echo $l['cargo_usuario']; ?>"
                                        codigo="<?php echo $l['codigo_unidade']; ?>"
                                        data="<?php echo $l['dt_entrada']; ?>">
                                        <i class="botoes bi bi-trash3-fill"></i>
                                    </button>
                                    <?php } else { ?>
                                    <button class="btn btn-danger btn-sm sair" data-toggle="modal" data-target="#sair"
                                        title="sair" cd="<?php echo $l['cd_unidade']; ?>"
                                        nome="<?php echo $l['nm_unidade']; ?>"
                                        cargo="<?php echo $l['cargo_usuario']; ?>"
                                        codigo="<?php echo $l['codigo_unidade']; ?>"
                                        data="<?php echo $l['dt_entrada']; ?>">
                                        <i class="botoes bi bi-box-arrow-right"></i>
                                    </button>
                                    <?php } ?>


                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <?php
        }else{
            echo "<div class='col-12 text-center text-muted my-3' style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'><h5>Nenhuma conexão encontrada.</h5></div>";
        }
        include_once 'footer.php';
?>
    </div>
</body>

<?php
 if(!empty($_POST)){
    if($_POST['action'] == "Criar"){
        CriarUnidade(
            $_POST['nome'],
            $_SESSION['id'],
            "?route=/unidades"
        );
    }else if($_POST['action']== "Deletar"){
        DeletarUnidade(
            $_POST['cd'],
            "?route=/unidades"
        );
    }else if($_POST['action']=="Sair"){
        SairUnidade(
            $_SESSION['id'],
            $_POST['cd'],
            "?route=/unidades"
        );
    }else if($_POST['action']== "Entrar"){
        EntrarUnidade(
            $_SESSION['id'],
            $_POST['code'],
            "?route=/unidades"
        );
    }else if($_POST['action']=="Acessar"){
        $_SESSION['unidade']=$_POST['cd'];
        $_SESSION['nm_unidade']=$_POST['nome'];
        $_SESSION['cargo']=$_POST['cargo'];
        if($_POST['cargo']!="comum"){
            ?>
<script>
location.href = "?route=/painel";
</script>
<?php
        }else if($_POST['cargo']=="comum"){
            ?>
<script>
location.href = "?route=/comum";
</script>
<?php
        }
    }else if($_POST['action']=="Editar"){
        EditarUnidade(
            $_POST['cd'],
            $_POST['nome'],
            "?route=/unidades"
        );
    }
 }
?>