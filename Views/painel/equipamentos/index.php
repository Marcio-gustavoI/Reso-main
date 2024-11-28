<?php
include_once './Views/painel/header.php';
include_once './Views/painel/equipamentos/equipamentos/modal.php';
include_once  './Views/painel/equipamentos/equipamentos/function.php';
include_once  './Views/painel/equipamentos/equipamentos/script.php';
?>

<style>
.botoes {
    font-size: 20px;
}

.feedback-text {
    word-wrap: break-word;
    max-width: 200px;
    overflow: auto;
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
    <?php include_once  './Views/painel/nav.php'; ?>
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-xs-2">
                <div></div>
            </div>
            <div class="col-sm-8">
            <h4 class="text-muted text-center mt-2">LISTA DE EQUIPAMENTOS</h4>
            </div>
            <div class="col-sm-2 col-xs-2">
                <button class="btn btn-block d-flex flex-row "
                    style="background-color:#03305c; position: sticky; top: 0; z-index: 100;" data-toggle="modal"
                    data-target="#addequipamento">
                    <span class="text-white mx-auto">EQUIPAMENTO</span>
                </button>
            </div>
        </div>
        <div class="container-fluid">
            <div id="equipamentos-container" class="row mt-3 overflow-auto"
                style="overflow-y: scroll; overflow-x: hidden; scrollbar-width: none; scroll-behavior: smooth;">

            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
<script>
let categoriaFilter = '';
let salaFilter = '';

function carregarEquipamentos() {
    $.ajax({
        url: '?route=/painelEquipamentosAjax',
        method: 'GET',
        data: {
            categoria: categoriaFilter,
            sala: salaFilter
        },
        success: function(data) {
            $('#equipamentos-container').html(data);
        },
        error: function() {
            console.error('Erro ao carregar os equipamentos.');
        }
    });
}

setInterval(carregarEquipamentos, 5000);

$(document).ready(function() {
    carregarEquipamentos();
});
</script>

<?php
if (!empty($_POST)) {
    if ($_POST['action'] == "Criar") {
        $id_categoria = !empty($_POST['categoria']) ? intval($_POST['categoria']) : null;
        CriarEquipamento(
            strtoupper($_POST['nome']), 
            $_POST['desc'], 
            $id_categoria,
            $_SESSION['id'], 
            $_SESSION['unidade'], 
            "?route=/painelEquipamentos");
    } elseif ($_POST['action'] == "Editar") {
        EditarEquipamento(
            $_POST['cd'], 
            $_POST['nome'], 
            $_POST['desc'], 
            $_POST['status'], 
            $_POST['sala'], 
            $_POST['categoria'], 
            $_SESSION['id'], 
            $_SESSION['unidade'], 
            "?route=/painelEquipamentos");
    } elseif ($_POST['action'] == "Deletar") {
        ExcluirEquipamento(
            $_POST['cd'], 
            "?route=/painelEquipamentos");
    }
}
?>