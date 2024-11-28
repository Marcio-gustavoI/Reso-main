<?php
require_once './Views/painel/function.php';

$chamadosPorStatus = contarChamadosPorStatus();
if (is_array($chamadosPorStatus)):
    $cores = [
        'Aberto' => '#17a2b8',
        'Andamento' => '#ffc107',
        'Concluido' => '#28a745',
    ];
?>
<div class="container">
    <h2 class="text-center mb-4 text-muted" style="color: #333; font-weight: bold;">Chamados</h2>
            <?php foreach (['Aberto', 'Andamento', 'Concluido'] as $status):
                $quantidade = $chamadosPorStatus[$status] ?? 0;
                $cor = $cores[$status];
            ?>
            <div class="status-card mb-3" style="
                border: 2px solid <?= $cor ?>;
                border-radius: 10px;
                padding: 10px;
                background-color: transparent;
                transition: transform 0.3s ease;
            ">
                <div class="d-flex justify-content-between align-items-center">
                    <div style="
                        font-size: 1.5rem; 
                        color: <?= $cor ?>; 
                        font-weight: bold;
                    ">
                        <?= $status ?>
                    </div>
                    <div style="
                        font-size: 1.5rem; 
                        color: <?= $cor ?>; 
                        font-weight: bold;
                    ">
                        <?= $quantidade ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
</div>
<?php else: ?>
<div class="alert alert-danger">
    <?= $chamadosPorStatus ?>
</div>
<?php endif; ?>

<style>
.status-card {
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.status-card:hover {
    transform: scale(1.01);
}
</style>