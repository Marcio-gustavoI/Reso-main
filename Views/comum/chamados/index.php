<?php
include_once  './Views/comum/header.php';
include_once  './Views/comum/chamados/chamados/modal.php';
include_once  './Views/comum/chamados/chamados/function.php';
include_once  './Views/comum/chamados/chamados/script.php';
?>

<style>
.botoes {
    font-size: 1rem;
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

.back-button {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #03305c;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: #022a50;
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
    <?php include_once  './Views/comum/nav.php'; ?>
    <br><br><br><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-xs-2">
                <form method="GET" action="" id="filter-form">
                    <button class="btn btn-block"
                        style="background-color:#03305c; position: sticky; top: 0; z-index: 100;" type="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-white mx-auto">FILTROS</span>
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item filter-btn" type="button" data-status="1">Aberto</button>
                        <button class="dropdown-item filter-btn" type="button" data-status="2">Andamento</button>
                        <button class="dropdown-item filter-btn" type="button" data-status="3">Concluído</button>
                        <button class="dropdown-item filter-btn" type="button" data-status="">Limpar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8 text-left">
                <h4 class="text-muted text-center mt-2">LISTA DE CHAMADOS</h4>
            </div>
            <div class="col-sm-2 col-xs-2">
                <button class="btn btn-block d-flex flex-row"
                    style="background-color:#03305c; position: sticky; top: 0; z-index: 100;" data-toggle="modal"
                    data-target="#abrirChamado">
                    <span class="text-white mx-auto">CHAMADO</span>
                </button>
            </div>
        </div>
        <div class="container-fluid">
            <div id="chamados-container" class="row mt-3 overflow-auto "
                style="overflow-y: scroll; overflow-x: hidden; scrollbar-width: none; scroll-behavior: smooth;">
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

<script>
let statusFilter = '';

function carregarChamados() {
    $.ajax({
        url: '?route=/comumChamadosAjax',
        method: 'GET',
        data: {
            status: statusFilter
        },
        success: function(data) {
            $('#chamados-container').html(data);
        },
        error: function() {
            console.error('Erro ao carregar os chamados.');
        }
    });
}

$(document).ready(function() {
    carregarChamados();

    $('.filter-btn').on('click', function() {
        statusFilter = $(this).data('status');
        carregarChamados();
    });
});

setInterval(carregarChamados, 5000);
</script>

<?php
if (!empty($_POST)) {
    if ($_POST['action'] == "Abrir") {
        $id_equipamento = !empty($_POST['equipamento']) ? intval($_POST['equipamento']) : null;
        AbrirChamado(
            strtoupper($_POST['titulo']), 
            $_POST['descricao'], 
            $id_equipamento,
            $_SESSION['id'], 
            $_SESSION['unidade'], 
            "?route=/comum");
    } elseif($_POST['action'] == "EmAndamento") {
        ColocarEmAndamento(
            $_POST['cd'],
            $_SESSION['id'], 
            $_SESSION['unidade'], 
            "?route=/comum"
        );
    } elseif ($_POST['action'] == "DeletarChamado") {
        DeletarChamado(
            $_POST['cd'], 
            $_SESSION['unidade'], 
            "?route=/comum");
    }elseif ($_POST['action'] == "ConcluirChamado") {
        ConcluirChamado(
            $_POST['cd'],
            $_POST['recado'],
            $_SESSION['id'],
            $_SESSION['unidade'],
            "?route=/comum"
        );
    }elseif ($_POST['action']== "Editar"){
        EditarChamado(
            $_POST['cd'],
            $_POST['titulo'],
            $_POST['descricao'],
            $_POST['Equipamento'],
            $_SESSION['unidade'],
            "?route=/comum"
        );
    }
}
?>