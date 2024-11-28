<script>
$(document).on('click', '.editar', function() {
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
    var desc = $(this).attr('desc');
    $('.modal #desc').val(desc);
});

$(document).on('click', '.deletar', function() {
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
    var desc = $(this).attr('desc');
    $('.modal #desc').val(desc);
});

$(document).on('click', '.ver', function() {
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
    var desc = $(this).attr('desc');
    $('.modal #desc').val(desc);
    var criado = $(this).attr('criado');
    $('.modal #criado').val(criado);
    var data = $(this).attr('data');
    $('.modal #data').val(data);
});
</script>