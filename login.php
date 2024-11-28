<?php
if (!defined('ROUTING_ACCESS')) {
    http_response_code(403);
    die('<h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Acesso direto não permitido</h1>');
}

require_once 'header.php';
include 'validar.php';
?>
<style>
body {
height: 100vh;
background: linear-gradient(111deg,
        #0000ffb4 0%,
        #0000b14f 50%,
        #000000 100%),
    url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%23444444' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23525055'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E"),
    #0e161e;
display: flex;
align-items: center;
justify-content: center;
font-family: Arial, sans-serif;
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

.login-card {
width: 100%;
max-width: 400px;
padding: 2rem;
background-color: rgba(255, 255, 255, 0.9);
border-radius: 10px;
box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
text-align: center;
}

.logo {
max-width: 120px;
margin-bottom: 1rem;
}

.login-card h3 {
color: #03305c;
margin-bottom: 1.5rem;
}

.btn-custom {
background-color: #f8cf40;
color: #03305c;
border: none;
}

.btn-custom:hover {
background-color: #e3b530;
}
</style>
</head>

<body>
<a href="?route=/" class="back-button">Voltar</a>
<div class="container-fluid">
    <div class="row justify-content-center h-100">
        <div class="login-card">
            <img src="assets/img/logoresoluton.png" alt="Logo" class="logo img-fluid">
            <h3>Login</h3>
            <form method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                </div>
                <input type="submit" name="action" class="btn btn-custom btn-block mt-3" value="Entrar"></input>
            </form>
            <p class="mt-3">Ainda não possui uma conta? <a href="?route=/registro">Registre-se aqui</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
	if(!empty($_POST)){
		if($_POST['action']=="Entrar"){
			ValidarLogin(
				$_POST['email'],
				$_POST['senha']
			);
		}
	}
?>