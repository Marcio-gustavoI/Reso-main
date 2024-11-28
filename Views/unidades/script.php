<script>
    $(document).on('click', '.ver', function(){
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
    var cargo = $(this).attr('cargo');
    $('.modal #cargo').val(cargo);
    var codigo = $(this).attr('codigo');
    $('.modal #codigo').val(codigo);
    var data = $(this).attr('data');
    $('.modal #data').val(data);
});

$(document).on('click', '.sair', function(){
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
    var cargo = $(this).attr('cargo');
    $('.modal #cargo').val(cargo);
    var codigo = $(this).attr('codigo');
    $('.modal #codigo').val(codigo);
    var data = $(this).attr('data');
    $('.modal #data').val(data);
});
$(document).on('click', '.deletar', function(){
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
    var cargo = $(this).attr('cargo');
    $('.modal #cargo').val(cargo);
    var codigo = $(this).attr('codigo');
    $('.modal #codigo').val(codigo);
    var data = $(this).attr('data');
    $('.modal #data').val(data);
});
$(document).on('click', '.editar', function(){
    var cd = $(this).attr('cd');
    $('.modal #cd').val(cd);
    var nome = $(this).attr('nome');
    $('.modal #nome').val(nome);
});
</script>