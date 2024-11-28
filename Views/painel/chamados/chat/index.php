<?php
include_once  './Views/painel/header.php';
?>

<style>
.chat-container {
    max-width: 100vh;
    max-height: 80vh;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    overflow: hidden;
}

.chat-header {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.chat-status {
    width: 12px;
    height: 12px;
    background-color: #28a745;
    border-radius: 50%;
    margin-right: 10px;
    box-shadow: 0 0 5px #28a745;
}

.chat-body {
    background-color: #f8f9fa;
    height: 75vh;
    overflow-y: auto;
    padding: 15px;
}

.chat-footer {
    background-color: #e9ecef;
    padding: 15px;
    border-top: 1px solid #dee2e6;
}

.mensagem {
    margin-bottom: 15px;
    max-width: 80%;
    min-width: 40%;
}

.mensagem-enviada {
    align-self: flex-end;
    background-color: #007bff;
    color: white;
    border-radius: 15px 15px 0 15px;
    padding: 10px;
    margin-left: auto;
    text-align: right;

}

.mensagem-recebida {
    align-self: flex-start;
    background-color: #e9ecef;
    border-radius: 15px 15px 15px 0;
    padding: 10px;
    margin-right: auto;
    text-align: left;
}

#form-mensagem {
    display: flex;
    flex-direction: row;
    column-gap: 10px
}

.data {
    font-size: 10px;
}

.back-button {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #03305c;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: #022a50;
}

.mensagem img {
    border: 2px solid rgba(0, 0, 0, 0.1);
}

.mensagem-enviada img {
    margin-left: 10px;
}

.mensagem-recebida img {
    margin-right: 10px;
}

.mensagem-container {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    max-width: 100%;
}

.mensagem-recebida-container {
    flex-direction: row;
}

.mensagem-enviada-container {
    flex-direction: row-reverse;
    justify-content: flex-end;
}

.foto-perfil {
    width: 40px;
    height: 40px;
    object-fit: cover;
    margin: 10px 10px;
}

.mensagem-container .mensagem {
    max-width: 80%;
}

.mensagem-enviada-container .mensagem {
    text-align: right;
}

.mensagem-recebida-container .mensagem {
    text-align: left;
}
.a{
    width: 19rem;
}

@media (max-width: 700px) {
    .chat-container {
        max-width: 60vh;
        margin: 0 auto;
    }
    .a{
        width: 15rem;
    }
}
</style>

<body class="bg-light" style="height:100vh;">
    <a href="javascript:history.back()" class="back-button">Voltar</a>
    <div class="container-fluid d-flex align-items-center justify-content-center"
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        <div class="chat-container card" style="width:400px;">
            <div class="chat-header">
                <div class="d-flex align-items-center">
                    <span class="chat-status"></span>
                    <h5 class="mb-0 text-white">Chat do Chamado</h5>
                </div>
            </div>
            <div class="chat-body d-flex flex-column" id="mensagens">
            </div>
            <div class="chat-footer">
                <div class="input-group">
                    <form id="form-mensagem">
                        <input type="hidden" name="id_chamado" value="<?= $_GET['idChamado'] ?>">
                        <input type="text" class="form-control a" name="mensagem"
                            placeholder="Digite sua mensagem" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-paper-plane" style="font-size:25px"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>
</body>

<script>
let ultimoIdMensagem = 0;
const idUsuarioLogado = <?= $_SESSION['id'] ?>;

document.getElementById('form-mensagem').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    fetch('?route=/painelChatEnviar', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                this.querySelector('input[name="mensagem"]').value = '';
                buscarMensagens();
            } else {
                alert('Erro ao enviar mensagem: ' + data.mensagem);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao enviar mensagem');
        });
});

function buscarMensagens() {
    const idChamado = document.querySelector('input[name="id_chamado"]').value;

    fetch(`?route=/painelChatBuscar&idChamado=${idChamado}&ultimo_id=${ultimoIdMensagem}`)
        .then(response => response.json())
        .then(data => {
            if (data.status && data.mensagens.length > 0) {
                const containerMensagens = document.getElementById('mensagens');
                data.mensagens.forEach(msg => {
                    const divMensagem = document.createElement('div');
                    divMensagem.classList.add('mensagem-container');
                    divMensagem.classList.add(
                        msg.ID == idUsuarioLogado ?
                        'mensagem-enviada-container' :
                        'mensagem-recebida-container'
                    );

                    const dataFormatada = formatarData(msg.data_envio);

                    const imagemPerfil = msg.url_imagem_perfil ?
                        `assets/img/PerfilImgs/${msg.url_imagem_perfil}` :
                        'assets/img/PerfilImgs/iconpadraoperfil.png';

                    divMensagem.innerHTML = `
                        <img 
                            src="${imagemPerfil}" 
                            alt="Foto de perfil" 
                            class="foto-perfil rounded-circle" 
                        >
                        <div class="mensagem ${msg.ID == idUsuarioLogado ? 'mensagem-enviada' : 'mensagem-recebida'}">
                            <div class="remetente">
                                <strong>${msg.remetente}</strong><br> 
                            </div> 
                            <div class="texto-mensagem">
                                ${msg.mensagem}<br> 
                            </div>
                            <div class="data" data-data-envio="${msg.data_envio}">
                                <span>${dataFormatada}</span><br> 
                            </div>
                        </div>
                    `;
                    containerMensagens.appendChild(divMensagem);

                    ultimoIdMensagem = Math.max(ultimoIdMensagem, msg.id_mensagem);
                });

                containerMensagens.scrollTop = containerMensagens.scrollHeight;
            }
        })
        .catch(error => {
            console.error('Erro ao buscar mensagens:', error);
        });
}


function atualizarDatas() {
    const mensagens = document.querySelectorAll('.mensagem .data');
    mensagens.forEach(dataElemento => {
        const dataEnvio = dataElemento.getAttribute('data-data-envio');
        const novaData = formatarData(dataEnvio);
        dataElemento.querySelector('span').innerText = novaData;
    });
}


function formatarData(dataEnvio) {

    const partes = dataEnvio.split(" ");
    const dataParte = partes[0].split("/");
    const horaParte = partes[1].split(":");

    const dia = dataParte[0];
    const mes = dataParte[1];
    const hora = horaParte[0];
    const minuto = horaParte[1];

    const dataMensagem = new Date();
    dataMensagem.setFullYear(new Date().getFullYear(), mes - 1, dia);
    dataMensagem.setHours(hora);
    dataMensagem.setMinutes(minuto);
    dataMensagem.setSeconds(0);
    dataMensagem.setMilliseconds(0);

    const agora = new Date();
    const diffMs = agora - dataMensagem;

    const diffSegundos = Math.floor(diffMs / 1000);
    const diffMinutos = Math.floor(diffSegundos / 60);
    const diffHoras = Math.floor(diffMinutos / 60);
    const diffDias = Math.floor(diffHoras / 24);

    if (diffMinutos < 1) {
        return "Agora";
    } else if (diffMinutos < 30) {
        return `${diffMinutos} minuto${diffMinutos === 1 ? '' : 's'} atrás`;
    } else if (diffMinutos >= 30 && diffMinutos < 60) {
        return `Hoje às ${hora}:${minuto}`;
    } else if (diffHoras < 24) {
        return `${diffHoras} hora${diffHoras === 1 ? '' : 's'} atrás`;
    } else if (diffDias < 30) {
        return `${diffDias} dia${diffDias === 1 ? '' : 's'} atrás`;
    } else {
        return `${dia}/${mes} ${hora}:${minuto}`;
    }
}


setInterval(buscarMensagens, 500);
setInterval(atualizarDatas, 500);

buscarMensagens();
</script>