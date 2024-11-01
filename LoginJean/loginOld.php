<?php
session_start();
require 'Contato.class.php';

if(isset($_POST['email']) && !empty($_POST['email'])){
	$nome  = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$contato = new Contato();
	
	$chkUser = $contato->checkUser($email);

	if(!empty($chkUser)){
		$chkPass = $contato->checkPass($email, $senha);
		if(!empty($chkPass)){
			$_SESSION['nome'] =  $chkPass['nome'];
			header("location:index.php");
		}else{
			?>
			<script>
				var resultado = confirm("Usuario ou senha inválidos!\nClique OK para voltar para o login");
				if (resultado == true){
					window.location.replace('login.php')
				}
			</script>
			<?php  
		}
	}else{
		?>
		<script>
			var resultado = confirm("Usuario NÃO cadastrado!\nClique OK para Cadastrar");
			if (resultado == true){
				window.location.replace('login.php')
			}
		</script>
		<?php  
	}
}
?>
<!DOCTYPE html>
<head>
	<script src="js/acesso.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Login 3</title>
</head>
<body>	
	<div class = "topo verde">	
		<div class = "data verde borda" >
			<script>
				acesso();
			</script>	
		</div>
		<spam class="fonte">Logomarca
	</div>	
	<div class="centraliza">
		<div class = "formulario interna ">
				<h3 style="text-align: center;">Login</h3>
			<form class = "form" method="post">
				Nome:<br>
				<input type="text" name="nome" required class="i1"><br><br>
				Email:<br>
				<input type="text" name="email" required class="i1"><br><br>
				Senha:<br> 
				<input type="password" name="senha" required class="i1"><br><br>

				<p><a href="forgotpass.html" class="esqueceu">Esqueceu a senha?</a>
				<a href='cadastrar.php' class = "esqueceu">Cadastrar Novo Usuario</a></p>
				<input type="submit" name="botao" value="Enviar Dados" class = "centralizaBotao">
			</form>
		</div>
	</div>
</body>
</html>
