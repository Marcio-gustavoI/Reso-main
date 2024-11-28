<?php
require_once './Views/painel/header.php';

?>

<body>
    <?php
require_once 'nav.php';
?>
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-4" id="card-container">
                <!-- Listagem dos items com ajax -->
           </div>
        </div>
    </div>
    <?php
include_once 'footer.php';
?>
</body>

<script>
function carregarCards() {
    $.ajax({
        url: '?route=/painelAjax',
        method: 'GET',
        success: function(data) {
            $('#card-container').html(data);
        },
        error: function() {
            console.error('Erro ao carregar os cards');
        }
    });
}


setInterval(carregarCards, 5000);


$(document).ready(function() {
    carregarCards();
});
</script>