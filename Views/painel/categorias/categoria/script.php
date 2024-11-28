<script>
$(document).on('click', '.editar', function() {
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
});

$(document).on('click', '.deletar', function() {
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
});
</script>