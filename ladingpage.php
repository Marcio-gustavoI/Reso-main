<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolut.on</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<style>
     
html,
body {
    overflow-y: scroll;
    overflow-x: hidden;
    scrollbar-width: none;
    scroll-behavior: smooth;
}

.background {
    height: 100%; 
    background: linear-gradient(
            111deg,
            #0000ffb4 0%, 
            #0000b14f 50%, 
            #000000 100% 
        ),
        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23444444' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23525055'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E"),
        #0e161e; 
    background-size: cover;
    background-position: center;
}

.gradient-background {
    height: 100vh; 
    background: linear-gradient(
            111deg,
            #0000ffb4 0%, 
            #0000b14f 50%, 
            #000000 100% 
        ),
        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23444444' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23525055'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E"),
        #0e161e;
    background-size: cover;
    background-position: center;
    align-items: center;
    font-size: 3rem;
}


.header-container {
    display: flex;
    flex-direction: column; 
    height: auto; 
    width: 100%;
    justify-content: center; 
    padding: 20px; 
}


.header-content {
    display: flex;
    flex-direction: row; 
    align-items: center; 
    justify-content: center; 
}

@media (max-width: 1180px) {
    .header-content {
        flex-direction: column; 
        align-items: center; 
    }
}

.text-title, .text-title2 {
    font-family: 'Poppins', sans-serif;
    position: relative;
    text-align: center; 
}

.text-title::after {
    content: '';
    position: absolute;
    bottom: -3px; 
    left: 50%;
    transform: translateX(-50%); 
    width: 50%; 
    height: 2px;
    background-color: #F8CF40; 
    border-radius: 2px; 
}


.logo {
    width: 100%;
    max-width: 300px; 
    height: auto; 
    margin: 20px auto; 
}


.project-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 60px;
}

.project-name {
    font-size: clamp(2.5rem, 6vw, 9rem); 
    color: #ffffff;
    font-weight: bold;
    margin-top: 20px;
}

.project-description {
    color: #ffffff;
    margin-bottom: 20px;
    text-align: center; 
    font-size: 1.25rem; 
}


.button-container {
    display: flex;
    gap: 10px;
    justify-content: center; 
    padding: 10px;
}

.custom-btn,
.custom-btn2 {
    background-color: #F8CF40;
    color: rgb(0, 0, 0);
    border: 2px solid transparent;
    border-radius: 10px;
    padding: 15px 30px;
    font-size: 1.5rem;
    transition: all 0.3s ease;
}

.custom-btn:hover,
.custom-btn2:hover {
    background-color: transparent;
    color: #F8CF40;
    border-color: #F8CF40;
}


.dark-section {
    background-color: #1c1c1e;
    color: #fff;
    min-height: 70vh;
    padding: 60px 20px;
    text-align: center;
}


.card-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 40px;
    padding: 30px 0;
}

.card {
    background-color: rgba(24, 24, 26, 0.95);
    padding: 40px;
    text-align: left;
    max-width: 400px;
    width: 100%;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, border-color 0.3s ease-in-out;
    border: 2px solid transparent;
    border-radius: 13px;
    color: #ffffff;
}

.card h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #F8CF40;
}

.card p {
    color: #e0e0e0;
    font-size: 1rem;
    line-height: 1.5;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    border-color: #F8CF40;
}

@media (max-width: 1180px) {
    .card-container, .header-container {
        flex-direction: column;
        align-items: center;
    }

    .card {
        max-width: 90%;
    }
}

.logo {
    width: 100%; 
    max-width: 660px; 
    height: auto; 
    margin: 20px auto;
}


.white-section {
    background-color: #f8f9fc;
    padding: 60px 20px;
    color: #333;
    text-align: center;
}

.content-container {
    max-width: 1200px;
    margin: 0 auto;
}

.section-subtitle {
    color: #0000ff;
    font-weight: bold;
    font-size: 1.3rem;
    background-color: #0000ff42;
    border-radius: 30px;
    padding: 8px;
    text-align: center;
    margin: auto;
    width: 20%;
}

.card-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-top: 40px;
}

@media (max-width: 768px) {
    .card-grid {
        grid-template-columns: 1fr; 
    }
}

.custom-card {
    background-color: #f8f9fc;
    padding: 20px;
    text-align: left;
    border-left: 2px solid #0000ff6b;
}

.card-number {
    color: #0000ff6b;
    font-weight: bold;
    font-size: 1.2rem;
}

.custom-card h3 {
    font-size: 1.3rem;
    margin: 10px;
}

.text-creator {
    border-bottom: 3px solid #0000ff;
    width: 20%;                       
    margin: 0 auto;                   
    border-radius: 2px;
    margin-bottom: 4%;
    font-family: 'Poppins', sans-serif;
    color: white;

}
</style>
<body>    
    <header class="header-container gradient-background d-flex align-items-center">
        <div class="container text-center">
            <div class="header-content">
                <img src="./assets/img/logolandingpage.png" class="logo img-fluid mb-4" alt="Logo Resolut.on"> 
                <div class="project-info">
                    <h1 class="project-name display-4">Resolut.on</h1>
                    <p class="project-description text-wrap lead">Descubra como nosso help desk pode revolucionar o gerenciamento 
                       <br> de suas solicitações e transformar sua eficiência.</p>
                    <div class="button-container">
                        <a href="#dark-section" class="btn custom-btn btn-lg">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="dark-section" id="dark-section">
        <h2 class="text-title display-6 fw-bold mb-4">Implemente um help desk de nível empresarial</h2>
        <div class="text-center">
            <a href="?route=/login" class="btn custom-btn2 mt-4">Testar</a>
        </div>    
        <div class="card-container" data-aos="zoom-in-up">
            <div class="card">
                <i class="bi bi-columns-gap"></i>
                <h3>Como funciona?</h3>
                <p>Nosso sistema permite que você crie tickets e acompanhe o status de suas solicitações em tempo real.</p>
            </div>
            <div class="card">
                <i class="bi bi-columns-gap"></i>
                <h3>Benefícios</h3>
                <p>Melhore a comunicação, agilize a resolução de problemas e ofereça um melhor suporte aos seus usuários.</p>
            </div>
            <div class="card">
                <i class="bi bi-columns-gap"></i>
                <h3>Público-alvo</h3>
                <p>Nosso serviço é projetado para atender uma ampla gama de usuários, incluindo organizações, instituições educacionais, setor público e usuários finais.</p>
            </div>
        </div>
    </div>
    
    <section class="white-section">
        <div class="content-container">
            <h2 class="section-subtitle text-uppercase">Funcionalidades</h2>
            <h3 class="text-center display-6 fw-bold mt-4 text-title2">Transforme desafios em soluções</h3>
            <p class="text-center">Revolucione seu atendimento com Resolut.on</p>
            <div class="card-grid">
                <div class="custom-card">
                    <span class="card-number">01</span>
                    <h4>Descrição da Funcionalidade</h4>
                    <p>Implemente um serviço que torna possível a adoção de estratégias para organizar o fluxo de trabalho, priorizar tarefas urgentes e maior eficiência na resolução de problemas.</p>
                </div>
                <div class="custom-card">
                    <span class="card-number">02</span>
                    <h4>Status do chamado</h4>
                    <p>Cada chamado pode ter três status distintos: Aberto, onde a solicitação é registrada; Em Andamento, onde a equipe de suporte trabalha na resolução; e Concluído, quando o problema é solucionado.</p>
                </div>
                <div class="custom-card">
                    <span class="card-number">03</span>
                    <h4>Atribuição de chamados a salas</h4>
                    <p>Esta funcionalidade permite que os usuários atribuam chamados a salas específicas, de acordo com o assunto do chamado.</p>
                </div>
                <div class="custom-card">
                    <span class="card-number">04</span>
                    <h4>Comunicação por chat</h4>
                    <p>Permite que os usuários e membros da equipe de suporte se comuniquem diretamente por meio de um chat em tempo real.</p>
                </div>
            </div>
        </div>
    </section>

<div class="background">
    <div class="container py-5">
        <h2 class="text-center display-6 fw-bold mt-3 mb-10 text-creator">Criadores</h2>
        <div class="row row-cols-1 row-cols-md-3 g-7 mt-3">
            
            <div class="col">
                <div class="card h-70">
                    <img src="./assets/img/Lais.jpg" class="card-img-top" alt="Foto do Criador 1">
                    <div class="card-body">
                        <h5 class="card-title text-white text-center">Laís Liborio</h5>
                        <p class="card-text text-white">Olá, meu nome é Lais, e fui responsável pela elaboração e da documentação do projeto Resolut.on.</p>
                        <div class="d-flex justify-content-between">
                            <a href="https://wa.me/5512991024353?text=Olá+esse+é+o+contato+de+Laís" class="btn btn-success">WhatsApp</a>
                            <a href="#" class="btn btn-dark">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="col">
                <div class="card h-70">
                    <img src="./assets/img/Marcio.jpg" class="card-img-top" alt="Foto do Criador 2">
                    <div class="card-body">
                        <h5 class="card-title text-white text-center">Marcio Gustavo</h5>
                        <p class="card-text text-white">Olá, meu nome é Márcio, e fui responsável pela criação e desenvolvimento da parte visual do projeto Resolut.on.</p>
                        <div class="d-flex justify-content-between">
                            <a href="https://wa.me/5512996124525?text=Olá+esse+é+o+contato+de+Marcio" class="btn btn-success">WhatsApp</a>
                            <a href="#" class="btn btn-dark">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-70">
                    <img src="./assets/img/Victor.jpg" class="card-img-top" alt="Foto do Criador 3">
                    <div class="card-body">
                        <h5 class="card-title text-white text-center">Victor</h5>
                        <p class="card-text text-white">Olá, meu nome é Victor, e fui responsável pelo desenvolvimento da parte funcional e do backend do projeto Resolut.on.</p>
                        <div class="d-flex justify-content-between">
                            <a href="https://wa.me/5512996689560?text=Olá+esse+é+o+contato+de+Victor" class="btn btn-success">WhatsApp</a>
                            <a href="#" class="btn btn-dark">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>