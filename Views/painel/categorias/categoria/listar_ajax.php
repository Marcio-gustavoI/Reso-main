<?php
require_once './Views/painel/categorias/categoria/function.php';

$listar = ListarCategorias(null);

if ($listar) {
?>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="bg-primary text-white text-center">
            <tr>
                <th style="width: 30%;">Nome da Categoria</th>
                <th style="width: 20%;">Data de Criação</th>
                <th style="width: 25%;">Criado Por</th>
                <th style="width: 25%;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listar as $l): ?>
            <tr class="text-center">
                <td data-label="Nome"><?= $l['categoria_nm'] ?></td>
                <td data-label="Data"><?= $l['dt_categoria'] ?></td>
                <td data-label="Criado"><a href="?route=/painelUsuarios#id<?= $l['cd_usuario'] ?>"><?= $l['nm_usuario'] ?></a></td>
                <td data-label="Ações" class="btn-group" style="border:none;column-gap:5px;">
                    <button class="btn btn-danger btn-sm deletar" data-toggle="modal" data-target="#deletar"
                        title="Deletar" cd="<?= $l['cd_categoria']; ?>" nome="<?= $l['categoria_nm']; ?>"
                        criado="<?= $l['id_usuario']; ?>" data="<?= $l['dt_categoria']; ?>" style="font-size: 14px;">
                        <i class="bi bi-trash3-fill" style="font-size: 16px;"></i> Deletar
                    </button>
                    <button class="btn btn-primary btn-sm editar" data-toggle="modal" data-target="#editar"
                        title="Editar" cd="<?= $l['cd_categoria']; ?>" nome="<?= $l['categoria_nm']; ?>"
                        criado="<?= $l['id_usuario']; ?>" data="<?= $l['dt_categoria']; ?>" style="font-size: 14px;">
                        <i class="bi bi-pencil-fill" style="font-size: 16px;"></i> Editar
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
} else {
    echo "<div class='col-12 text-center text-muted my-3' style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'><h5>Nenhuma categoria encontrada.</h5></div>";
}
?>
