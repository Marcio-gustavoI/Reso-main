<script>
    $(document).on('click', '.andamento', function() {
    var cd = $(this).attr('cd');
    $('#modalAndamento #cd').val(cd);

    var titulo = $(this).attr('titulo');
    $('#modalAndamento #Titulo').val(titulo);

    var descricao = $(this).attr('descricao');
    $('#modalAndamento #Descricao').val(descricao);

    var equipamento = $(this).attr('equipamento');
    $('#modalAndamento #Equipamento').val(equipamento);

    var status = $(this).attr('status');
    $('#modalAndamento #Status').val(status);

    var abertura = $(this).attr('abertura');
    $('#modalAndamento #Abertura').val(abertura);

    var usuario = $(this).attr('usuario');
    $('#modalAndamento #Usuario').val(usuario);
});

$(document).on('click', '.editar', function() {
    var cd = $(this).attr('cd');
    $('#modalEditar #cd').val(cd);

    var titulo = $(this).attr('titulo');
    $('#modalEditar #Titulo').val(titulo);

    var descricao = $(this).attr('descricao');
    $('#modalEditar #Descricao').val(descricao);

    var equipamento = $(this).attr('equipamento');
    $('#modalEditar select#Equipamento').val(equipamento);

    var status = $(this).attr('status');
    $('#modalEditar #Status').val(status);

    var abertura = $(this).attr('abertura');
    $('#modalEditar #Abertura').val(abertura);

    var usuario = $(this).attr('usuario');
    $('#modalEditar #Usuario').val(usuario);
});

$(document).on('click', '.concluir', function() {
    var cd = $(this).attr('cd');
    $('#modalConclusao #cd').val(cd);
    var titulo = $(this).attr('titulo');
    $('#modalConclusao #titulo').val(titulo);
});

$(document).on('click', '.deletar', function() {
    var cd = $(this).attr('cd');
    $('#deletar #cd').val(cd);
    var titulo = $(this).attr('titulo');
    $('#deletar #titulo').val(titulo);
});

$(document).on('click', '.ver', function() {
    var cd = $(this).attr('cd');
    $('#ver #cd').val(cd);

    var titulo = $(this).attr('titulo');
    $('#ver #Titulo').val(titulo);

    var descricao = $(this).attr('descricao');
    $('#ver #Descricao').val(descricao);

    var equipamento = $(this).attr('equipamento');
    $('#ver #Equipamento').val(equipamento);

    var status = $(this).attr('status');
    $('#ver #Status').val(status);

    var abertura = $(this).attr('abertura');
    $('#ver #Abertura').val(abertura);

    var usuario = $(this).attr('usuario');
    $('#ver #Usuario').val(usuario);

    var fechamento = $(this).attr('fechamento');
    $('#ver #fechamento').val(fechamento);

    var final = $(this).attr('final');
    $('#ver #final').val(final);

    var feedback = $(this).attr('feedback');
    $('#ver #feedback').val(feedback);
});

</script>

