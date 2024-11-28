<?php
session_start();
include_once  './Views/comum/equipamentos/equipamentos/function.php';

$listar = ListarEquipamentos(null,null);

if ($listar && count($listar) > 0) {
    ?>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="bg-primary text-white text-center">
            <tr>
                <th style="width: 15%;">Nome</th>
                <th style="width: 15%;">Categoria</th>
                <th style="width: 15%;">Status</th>
                <th style="width: 15%;">Local</th>
                <th style="width: 15%;">Criado por</th>
                <th style="width: 40%;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listar as $l){ ?>
            <tr class="text-center"  id="id<?= $l['cd_equipamento'] ?>">
                <td><?= $l['nm_equipamento'] ?></td>
                <td><?= $l['categoria_nm'] ?? 'NÃO ESPECIFICADO' ?></td>
                <td>
                    <span class="text-white badge <?php if($l['nm_status'] == 'Ativo'){ echo'bg-success';}elseif($l['nm_status'] == 'Desativado'){echo'bg-danger';}else{echo'bg-warning';}  ?>"
                        style="font-size: 15px;">
                        <?= $l['nm_status'] ?>
                    </span>
                </td>
                <td><a href="?route=/painelSalas#<?= $l['id_sala'] ?>"><?= $l['nm_sala'] ?></a></td>
                <td><a href="?route=/painelUsuarios#<?= $l['id_usuario'] ?>"><?= $l['nm_usuario'] ?></a></td>
                <td class="btn-group" style="border:none;column-gap:5px;">
                    <button class="btn btn-danger btn-sm deletar" data-toggle="modal" data-target="#deletar"
                        title="Deletar" cd="<?= $l['cd_equipamento']; ?>" nome="<?= $l['nm_equipamento']; ?>">
                        <i class="botoes bi bi-trash3-fill"></i> Deletar
                    </button>
                    <button class="btn btn-primary btn-sm editar" data-toggle="modal" data-target="#editar"
                        cd="<?= $l['cd_equipamento']; ?>" nome="<?= $l['nm_equipamento']; ?>"
                        desc="<?= $l['ds_equipamento'] ?>"
                        categoria="<?= $l['id_categoria']; ?>" sala="<?= $l['id_sala']; ?>"
                        status="<?= $l['st_equipamento']; ?>" descricao="<?= $l['ds_equipamento']; ?>">
                        <i class="botoes bi bi-pencil-fill"></i> Editar
                    </button>
                    <button class="btn btn-success btn-sm ver" data-toggle="modal" data-target="#ver"
                        cd="<?= $l['cd_equipamento']; ?>" nome="<?= $l['nm_equipamento']; ?>"
                        desc="<?= $l['ds_equipamento']; ?>" usuario="<?= $l['nm_usuario'] ?>"
                        categoria="<?= $l['categoria_nm']; ?>" sala="<?= $l['nm_sala']; ?>"
                        status="<?= $l['nm_status']; ?>" descricao="<?= $l['ds_equipamento']; ?>">
                        <i class="botoes bi bi-eye-fill"></i> Ver
                    </button>
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>
<?php
} else {
    echo "<div class='col-12 text-center text-muted my-3' style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'><h5>Nenhuma equipamento encontrado.</h5></div>";
}
?>
