<?php
	require_once 'conect.php';

	function ValidarLogin($email, $senha){
		$sql = 'SELECT 
				cd_usuario, nm_usuario
				FROM tb_usuario 
				WHERE
				nm_email = ? AND
				cd_senha = sha2(?, 256)';
		
		$stmt = $GLOBALS['con']->prepare($sql);
		$stmt->bind_param('ss', $email, $senha);  
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows > 0){
			
			$r = $result->fetch_assoc();
			$_SESSION['id'] = $r['cd_usuario'];
			$_SESSION['usuario'] = $r['nm_usuario'];
			Confirma("Bem vindo ao Resolut.on", "?route=/unidades");
		} else {
			Erro("Acesso recusado!");
			session_destroy();
		}
	}

	function ValidarCadastro($usuario, $email, $senha) {
		global $con;
	
		$sql = 'SELECT COUNT(*) as total FROM tb_usuario WHERE nm_usuario = ?';
		$sql2 = 'SELECT COUNT(*) as total FROM tb_usuario WHERE nm_email = ?';
	
		$stmt = $con->prepare($sql);
		if (!$stmt) {
			die("Erro na preparação da query SQL para nome de usuário: " . $con->error);
		}
		$stmt->bind_param('s', $usuario);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
	
		$stmt2 = $con->prepare($sql2);
		if (!$stmt2) {
			die("Erro na preparação da query SQL para email: " . $con->error);
		}
		$stmt2->bind_param('s', $email);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
		$row2 = $result2->fetch_assoc();
	
		if ($row['total'] >= 1 || $row2['total'] >= 1) {
			return false;  
		} else {
			$sql3 = 'INSERT INTO tb_usuario (nm_usuario, nm_email, cd_senha) VALUES (?, ?, sha2(?, 256))';
			$stmt3 = $con->prepare($sql3);
			if (!$stmt3) {
				die("Erro na preparação da query SQL de inserção: " . $con->error);
			}
			$stmt3->bind_param('sss', $usuario, $email, $senha);
	
			$res = $stmt3->execute();
	
			if ($res) {
				Confirma("Cadastrado com sucesso!!", "?route=/login");
				return true; 
			} else {
				Erro("Não foi possível cadastrar o usuário :(");
				return false;
			}
		}
	}
	
	
	function Confirma($msg, $pagina){
		print'
			<div class="modal fade" id="myModal" data-backdrop="static">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-body text-center font-weight-bolder text-primary">
							<h3 class="titulo"><b>'.$msg.'</b></h3>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary btn-block mx-auto" onclick="redirecionar()">OK</button>
						</div>
					</div>
				</div>
			</div>
			<script>
				function redirecionar(){
					location.href = "'.$pagina.'";
				}
			</script>
		';
	}

	function Erro($msg){
		print'
			<div class="modal fade" id="myModal" data-backdrop="static">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-body text-center font-weight-bolder text-danger">
							<h3><b>'.$msg.'</b></h3>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger btn-block mx-auto" onclick="redirecionar()">OK</button>
						</div>
					</div>
				</div>
			</div>
			<script>
				function redirecionar(){
					history.go(-1);
				}
			</script>
		';
	}

	require_once 'footer.php';
?>
<style>
.myModal .modal-body {
    height: 370px;
}

i,
.bi {
    font-size: 55px;
}
</style>
<script>
$(document).ready(function() {
    $('#myModal').modal('show');
});

$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus');
});
</script>