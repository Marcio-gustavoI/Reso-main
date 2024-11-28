<?php
include_once  './Views/comum/chamados/chamados/function.php';

$status = isset($_GET['status']) ? $_GET['status'] : null;
$listar = ListarChamados($status);

if ($listar && count($listar) > 0) {
    ?>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="bg-primary text-white text-center">
            <tr>
                <th>Nome do Chamado</th>
                <th>Descrição</th>
                <th>Aberto em</th>
                <th>Finalizado em</th>
                <th>Status</th>
                <th>Equipamento</th>
                <th>Aberto por</th>
                <th>Acompanhado por</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listar as $l) { ?>
            <tr class="text-center">
                <td data-label="Nome"><?= $l['nm_chamado'] ?></td>
                <td data-label="Descrição"><?= strlen($l['ds_chamado']) > 30 ? substr($l['ds_chamado'], 0, 30) . '...' : $l['ds_chamado'] ?>
                </td>
                <td data-label="Abertura"><?= $l['dt_abertura'] ?></td>
                <td data-label="Fechamento"><?php if($l['st_chamado'] == 'Concluido') echo $l['dt_fechamento']; else echo "—"; ?></td>
                <td data-label="Status">
                    <span class="badge 
                        <?php 
                            echo match ($l['st_chamado']) {
                                'Aberto' => 'bg-primary',
                                'Andamento' => 'bg-warning',
                                'Concluido' => 'bg-success',
                                default => 'bg-secondary',
                            };
                        ?> text-white" style="font-size: 15px;"><?= $l['st_chamado'] ?>
                    </span>
                </td data-label="Equipamento">
                <?php if($l['id_equipamento']){ ?>
                <td><?= $l['nm_equipamento']?>
                </td>
                <?php }else{ ?>
                <td>
                —
                </td>
                <?php } ?>
                <td data-label="Aberto por"><?= $l['usuario_abertura'] ?></td>
               
                <td data-label="Acompanhado por"><?= $l['usuario_fechamento'] ?? '—' ?>
                </td>
                <td data-label="Ações" class="btn-group" style="border:none;column-gap:5px;">
                    <?php if ($_SESSION['cargo'] != 'comum' || $l['st_chamado'] == 'Aberto') { ?>
                    <button class="btn btn-danger btn-sm deletar" data-toggle="modal" data-target="#deletar"
                        title="Deletar" cd="<?= $l['cd_chamado']; ?>" titulo="<?= $l['nm_chamado']; ?>">
                        <i class="botoes bi bi-trash3-fill"></i> Deletar
                    </button>
                    <?php } 
                    if($l['st_chamado']!='Aberto'){
                    ?>
                    <a href="?route=/painelChatChamado&idChamado=<?= $l['cd_chamado'] ?>"
                        class="btn btn-secondary btn-sm">
                        <i class="botoes bi bi-chat-fill"></i> Chat
                    </a>
                    <?php
                    }
                    if ($l['st_chamado'] == 'Aberto' && $l['id_abertura'] == $_SESSION['id']) { ?>
                    <button class="btn btn-primary btn-sm editar" data-toggle="modal" data-target="#modalEditar"
                        cd="<?= $l['cd_chamado']; ?>" titulo="<?= $l['nm_chamado']; ?>"
                        descricao="<?= $l['ds_chamado'] ?>"
                        equipamento="<?= $l['id_equipamento'] ?? 'Não especificado' ?>"
                        status="<?= $l['st_chamado']; ?>" abertura="<?= $l['dt_abertura']; ?>"
                        usuario="<?= $l['usuario_abertura']; ?>">
                        <i class="botoes bi bi-pencil-fill"></i> Editar
                    </button>
                    <?php }
                    if ($l['st_chamado'] == 'Aberto' && $_SESSION['cargo'] != 'comum') { ?>
                    <button class="btn btn-warning btn-sm andamento text-white" data-toggle="modal" data-target="#modalAndamento"
                        cd="<?= $l['cd_chamado']; ?>" titulo="<?= $l['nm_chamado']; ?>"
                        descricao="<?= $l['ds_chamado'] ?>"
                        equipamento="<?= $l['nm_equipamento'] ?? 'Não especificado' ?>"
                        status="<?= $l['st_chamado']; ?>" abertura="<?= $l['dt_abertura']; ?>"
                        usuario="<?= $l['usuario_abertura']; ?>">
                        <i class="botoes bi bi-hourglass-split"></i> Andamento
                    </button>
                    <?php } elseif ($l['st_chamado'] == 'Andamento' && $_SESSION['cargo'] != 'comum') { ?>
                    <button class="btn btn-success btn-sm concluir" data-toggle="modal" data-target="#modalConclusao"
                        cd="<?= $l['cd_chamado']; ?>" titulo="<?= $l['nm_chamado']; ?>">
                        <i class="botoes bi bi-check-circle-fill"></i> Concluir
                    </button>
                    <?php } 
                    if ($l['st_chamado'] == 'Concluido') { ?>
                    <button class="btn btn-success btn-sm avaliar" data-toggle="modal" data-target="#modalAvaliar"
                        cd="<?= $l['cd_chamado']; ?>" titulo="<?= $l['nm_chamado']; ?>">
                        <i class="botoes bi bi-star-fill"></i> Avaliar
                    </button>
                    <?php } ?>
                    <button class="btn btn-primary btn-sm ver" data-toggle="modal" data-target="#ver"
                        cd="<?= $l['cd_chamado']; ?>" titulo="<?= $l['nm_chamado']; ?>"
                        descricao="<?= $l['ds_chamado'] ?>"
                        equipamento="<?= $l['nm_equipamento'] ?? 'Não especificado' ?>"
                        status="<?= $l['st_chamado']; ?>" abertura="<?= $l['dt_abertura']; ?>"
                        fechamento="<?= $l['dt_fechamento'] ?? 'Não finalizado' ?>"
                        final="<?= $l['usuario_fechamento'] ?? '----' ?>" usuario="<?= $l['usuario_abertura']; ?>"
                        feedback="<?= $l['ds_recado'] ?? '----' ?>">
                        <i class="botoes bi bi-eye-fill"></i> Ver
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
} else {
    echo "<div class='col-12 text-center text-muted my-3' style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'><h5>Nenhum chamado encontrado.</h5></div>";
}
?>