<?php 
require_once("conexao.php");

$query = $pdo->query("SELECT * from usuarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
$senha = '123';
$senha_crip = sha1($senha);
if($linhas == 0){
	$pdo->query("INSERT INTO usuarios SET nome = '$nome_sistema', email = '$email_sistema', senha = '', senha_crip = '$senha_crip', nivel = 'Administrador', ativo = 'Sim', foto = 'sem-foto.jpg', telefone = '$telefone_sistema', data = curDate() ");
}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title><?php echo $nome_sistema ?></title>

	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
 	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/logo azul.png" type="image/x-icon">

</head>
<body>
<div class="login">		
		<div class="form">
			<img class="logo-img" src="img/logo-login.png" class="imagem">
      <br>
			<img class="bv-img" src="img/Bem-vindo a Health Connect.png" class="imagem">

			<form method="post" action="autenticar.php">
				<input type="email" name="usuario" placeholder="Seu Email" required>
				<input type="password" name="senha" placeholder="Senha" required>
				<button class="btn-logar">Login</button>
				
			</form>	
			<br>
			<p class="recuperar"><a title="Clique para recupearar a senha" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Recuperar Senha</a></p>

		</div>
	</div>
</body>
</html>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content form">
     
      <form method="post" id="form-recuperar">     

      <div class="modal-body "> 
			
			<form method="post" id="form-recuperar">
				<input placeholder="Digite seu Email" class="form-control" type="email" name="email" id="email-recuperar" required> 
				<button type="submit">Recuperar</button>
			</form>				

		</div>
        	       	
       
       <br>
       <small><div id="mensagem-recuperar" align="center"></div></small>
   
     
  </form>
    </div>
  </div>
</div>





<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 <script type="text/javascript">
	$("#form-recuperar").submit(function () {

		$('#mensagem-recuperar').text('Enviando!!');

		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "recuperar-senha.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem-recuperar').text('');
				$('#mensagem-recuperar').removeClass()
				if (mensagem.trim() == "Recuperado com Sucesso") {
									
					$('#email-recuperar').val('');
					$('#mensagem-recuperar').addClass('text-success')
					$('#mensagem-recuperar').text('Sua Senha foi enviada para o Email')			

				} else {

					$('#mensagem-recuperar').addClass('text-danger')
					$('#mensagem-recuperar').text(mensagem)
				}


			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});
</script>