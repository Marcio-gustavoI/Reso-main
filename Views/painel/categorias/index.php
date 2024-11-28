<?php
require_once  './Views/painel/header.php';
require_once  './Views/painel/categorias/categoria/function.php';
require_once './Views/painel/categorias/categoria/modal.php';
require_once './Views/painel/categorias/categoria/script.php';
?>

<style>
.botoes {
    font-size: 1.5rem;
}

.table-responsive {
    height: 83vh;
    overflow-y: auto;
    position: relative;
    overflow-y: scroll;
    overflow-x: hidden;
    scrollbar-width: none;
    scroll-behavior: smooth;
}

.table thead {
    position: sticky;
    top: 0;
    z-index: 2;
    background-color: #007bff;
    color: white;
    border-top: 1px solid #dee2e6;
}

tbody {
    background-color: #f8f9fa;
}

tbody tr {
    scroll-margin-top: 50px;
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
    <?php include_once './Views/painel/nav.php'; ?>
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <h4 class="text-muted text-center mt-2">LISTA DE CATEGORIAS</h4>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-block d-flex flex-row" style="background-color:#03305c;" data-toggle="modal"
                    data-target="#addcategoria">
                    <span class="text-white mx-auto">CATEGORIA</span>
                </button>
            </div>
        </div>
        <div class="container-fluid">
            <div id="categorias-container" class="row mt-3 overflow-auto"
                style="overflow-y: scroll; overflow-x: hidden; scrollbar-width: none; scroll-behavior: smooth;">
                
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

<script>
function carregarCategorias() {
    $.ajax({
        url: '?route=/painelCategoriasAjax',
        method: 'GET',
        success: function(data) {
            $('#categorias-container').html(data);
        },
        error: function() {
            console.error('Erro ao carregar as categorias.');
        }
    });
}


setInterval(carregarCategorias, 5000);


$(document).ready(function() {
    carregarCategorias();
});
</script>
<?php
if(!empty($_POST)){
    if($_POST['action'] == "Criar"){
        CriarCategoria(
            strtoupper($_POST['nome']),
            $_SESSION['id'],
            $_SESSION['unidade'],
            "?route=/painelCategorias"
        );
    }elseif($_POST['action'] == "Editar"){
        EditarCategoria(
            $_POST['cd'],
           strtoupper($_POST['nome']),
            $_SESSION['unidade'],
            "?route=/painelCategorias"
        );
    }elseif($_POST['action'] == "Deletar"){
        DeletarCategoria(
            $_POST['cd'],
            $_POST['unidade'],
            "?route=/painelCategorias"
            );
    }
}
?>