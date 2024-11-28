<?php
if(!empty($_SESSION['id'])){
    $_SESSION['id'];
    $_SESSION['usuario'];
    include_once 'conect.php';
    include_once 'dialog.php';
    include_once 'function.php';
}
else{
    header("Location: ?route=/logout");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolut.On</title>
    <link rel="shortcut icon" type="imagex/png" href="../assets/img/logoresoluton.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/Reso/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
.back-button {
    position: static;
    display: inline-block;
    margin-bottom: 15px;
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

@media (max-width: 768px) {
    .container-fluid {
        padding: 10px;
    }

    .card-body {
        padding: 15px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        margin-bottom: 5px;
    }

    #previewImage {
        max-width: 8rem !important;
        height: 8rem !important;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }

    .form-group.row {
        margin-bottom: 10px;
    }

    .form-group.row>div {
        margin-bottom: 5px;
    }

    .row.align-items-center {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .col-sm-3.col-form-label {
        text-align: center;
        margin-bottom: 5px;
    }

    .col-sm-9 {
        width: 100%;
    }

    .form-group.row .btn-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 100%;
    }

    .form-group.row .btn-group .btn {
        width: 100%;
    }
}

@media (max-width: 992px) {
    .card-body .row {
        flex-direction: column;
        align-items: center;
    }

    .col-md-3 {
        margin-bottom: 20px;
    }

    .col-md-9 {
        width: 100%;
    }
}
</style>

<body>
    <div class="container-fluid py-3">
        <div class="row align-items-center mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <a href="<?= $_SESSION['PaginaAnterior'] ?>" class="back-button">Voltar</a>
                <h2 class="text-center flex-grow-1 mb-0">Configurações do Usuario</h2>
            </div>
        </div>

        <?php 
            $listar = BuscarporId();
            if($listar && count($listar)>0){
            foreach($listar as $l){

                $imagemPerfil = $l['url_imagem_perfil'] 
                    ? '/Reso/assets/img/PerfilImgs/'. $l['url_imagem_perfil'] 
                    : '/Reso/assets/img/PerfilImgs/iconpadraoperfil.png';
        ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <img id="previewImage" src="<?= $imagemPerfil ?>" alt="Foto do Perfil"
                                        class="rounded-circle mb-3"
                                        style="max-width: 10rem; height: 10rem; object-fit: cover;">
                                    <div class="mb-3 d-flex flex-column align-items-center">
                                        <input type="file" name="imagem" id="fileInput" accept="image/*"
                                            style="display: none;" onchange="previewFile()">
                                        <div class="btn-group" style="column-gap:5px">
                                            <button type="button" class="btn btn-primary btn-sm"
                                                onclick="document.getElementById('fileInput').click()">
                                                Alterar Foto
                                            </button>
                                            <input type="hidden" name="id" value="<?= $_SESSION['id']?>">
                                            <input type="submit" class="btn btn-success btn-sm" name="action"
                                                value="Confirma">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nome de Usuario</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nome"
                                                value="<?= $l['nm_usuario'] ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nome Completo</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nomereal"
                                                value="<?= $l['nm_real'] ?>" placeholder="Seu nome completo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">E-mail</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email"
                                                value="<?= $l['nm_email'] ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telefone</label>
                                        <div class="col-sm-9">
                                            <input type="tel" class="form-control" name="telefone"
                                                value="<?= $l['nr_telefone'] ?>" placeholder="(00) 00000-0000">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Data de Nascimento</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="nascimento" value="<?= $l['dt_nascimento'] ?>"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9 offset-sm-3 d-flex">
                                            <button type="submit" name="action" value="Editar"
                                                class="btn btn-primary mr-2">
                                                Salvar Alterações
                                            </button>
                                            <button type="reset" class="btn btn-secondary">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }}
            ?>
    </div>

</body>
<?php include_once 'footer.php';?>
<script>
function previewFile() {
    const preview = document.getElementById('previewImage');
    const file = document.getElementById('fileInput').files[0];

    if (file) {
        if (!file.type.startsWith('image/')) {
            alert('Por favor, selecione apenas arquivos de imagem.');
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            alert('A imagem deve ter no máximo 5MB.');
            return;
        }

        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "/Reso/assets/img/PerfilImgs/iconpadraoperfil.png";
        }
    }
}
</script>

<?php
    if(!empty($_POST)){
        if ($_POST['action'] == "Editar") {
           Editar(
                $_POST['nomereal'],
                $_POST['nascimento'],
                $_POST['telefone'],
                $_POST['id'],
                "?route=/config"
           );
        }elseif($_POST['action'] == "Confirma"){
            if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK){
                $uploaddir = '/Reso/assets/img/PerfilImgs/';
                
                $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
                $extensoesPermitidas = ["png", "jpg", "jpeg", "jfif", "webp"];
                
                if(in_array($extensao, $extensoesPermitidas)){
                    if($_FILES['imagem']['size'] <= 5 * 1024 * 1024) {
                        $nomeImagem = md5(date("d-m-y-h-i-s").$_FILES['imagem']['name']) . '.' . $extensao;
                        $caminhoCompleto = $_SERVER['DOCUMENT_ROOT'] . $uploaddir . $nomeImagem;
                        

                        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)){
                            EditarImagem(
                                $nomeImagem, 
                                $_POST['id'],
                                "?route=/config"
                            );
                        } else {
                            Erro("Erro ao fazer upload da imagem!");
                        }
                    } else {
                        Erro("Arquivo muito grande. Máximo de 5MB!");
                    }
                } else {
                    Erro("Formato de imagem não permitido!");
                }
            } else {
                Erro("Erro no upload do arquivo!");
            
        }
    }
    }
?>