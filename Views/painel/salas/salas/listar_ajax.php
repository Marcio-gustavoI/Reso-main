<?php
require_once './Views/painel/salas/salas/function.php';

$listar = ListarSalas();
if ($listar) {
    ?>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="bg-primary text-white text-center">
            <tr>
                <th>Nome</th>
                <th>Criado em</th>
                <th>Descrição</th>
                <th>Criado por</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listar as $l) { ?>
            <tr class="text-center" id="id<?= $l['cd_sala'] ?>">
                <td data-label="Nome"><?= $l['nm_sala'] ?></td>
                <td data-label="Data"><?= $l['dt_sala'] ?></td>
                <td data-label="Descrição">
                    <?= strlen($l['ds_sala']) > 30 ? substr($l['ds_sala'], 0, 30) . '...' : $l['ds_sala'] ?>
                </td>
                <td data-label="Criado por"><a href="?route=/painelUsuarios#id<?= $l['id_usuario'] ?>"><?= $l['nm_usuario'] ?></a></td>
                <td data-label="Ações" class="btn-group" style="border:none;column-gap:5px;">
                    <button class="btn btn-success btn-sm ver" data-toggle="modal" data-target="#ver" title="Ver"
                        cd="<?= $l['cd_sala']; ?>" nome="<?= $l['nm_sala']; ?>" desc="<?= $l['ds_sala']; ?>"
                        criado="<?= $l['nm_usuario']; ?>" data="<?= $l['dt_sala']; ?>">
                        <i class="botoes bi bi-eye-fill"></i> Ver
                    </button>
                    <?php if ($l['nm_sala'] != "ESTOQUE") { ?>
                    <button class="btn btn-danger btn-sm deletar" data-toggle="modal" data-target="#deletar"
                        title="Deletar" cd="<?= $l['cd_sala']; ?>" nome="<?= $l['nm_sala']; ?>" desc="<?= $l['ds_sala']; ?>"
                        criado="<?= $l['id_usuario']; ?>" data="<?= $l['dt_sala']; ?>">
                        <i class="botoes bi bi-trash3-fill"></i> Deletar
                    </button>
                    <button class="btn btn-primary btn-sm editar" data-toggle="modal" data-target="#editar"
                        title="Editar" cd="<?= $l['cd_sala']; ?>" nome="<?= $l['nm_sala']; ?>" desc="<?= $l['ds_sala']; ?>"
                        criado="<?= $l['id_usuario']; ?>" data="<?= $l['dt_sala']; ?>">
                        <i class="botoes bi bi-pencil-fill"></i> Editar
                    </button>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
} else {
    echo "<div class='col-12 text-center text-muted my-3' style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'><h5>Nenhuma sala encontrada.</h5></div>";
}
?>
