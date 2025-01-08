<?php 
include('../../conexao.php');
include('data_formatada.php');

?>

<!DOCTYPE html>
<html>
<head>

<style>
@import url('https://fonts.cdnfonts.com/css/tw-cen-mt-condensed');
@page { margin: 145px 20px 25px 20px; }
#header { position: fixed; left: 0px; top: -110px; bottom: 100px; right: 0px; height: 35px; text-align: center; padding-bottom: 100px; }
#content { margin-top: 0px; }
#footer { position: fixed; left: 0px; bottom: -60px; right: 0px; height: 80px; }
#footer .page:after { content: counter(page, my-sec-counter); }
body { font-family: 'Tw Cen MT', sans-serif; }

.marca {
	position: fixed;
	left: 50;
	top: 100;
	width: 80%;
	opacity: 8%;
}
</style>

</head>
<body>
<?php 
if ($marca_dagua == 'Sim') { ?>
	<img class="marca" src="<?php echo $url_sistema ?>img/logo.jpg">	
<?php } ?>

<div id="header">
	<div style="border-style: solid; font-size: 10px; height: 50px;">
		<table style="width: 100%; border: 0px solid #ccc;">
			<tr>
				<td style="width: 7%; text-align: left;">
					<img style="margin-top: 10px; margin-left: 10px;" id="imag" src="<?php echo $url_sistema ?>img/logo.jpg" width="120px">
				</td>
				<td style="width: 33%; text-align: left; font-size: 13px;">
					<!-- Informações adicionais, se necessário -->
				</td>
				<td style=" margin-top: 10px; width: 40%; text-align: right; font-size: 9px; padding-right: 10px;">
					<b><big>RELATÓRIO DE USUÁRIOS</big></b><br>
					<?php echo mb_strtoupper($data_hoje) ?>
				</td>
			</tr>		
		</table>
	</div>
	<br>

	<table id="cabecalhotabela" style="border-bottom-style: solid; font-size: 8px; margin-bottom:10px; width: 100%; table-layout: fixed;">
		<thead>
			<tr id="cabeca" style="margin-left: 0px; background-color:#CCC">
				<td style="width:25%">NOME</td>
				<td style="width:25%">EMAIL</td>
				<td style="width:15%">CBO</td>
				<td style="width:15%">TELEFONE</td>
				<td style="width:15%">DATA DE CADASTRO</td>
			</tr>
		</thead>
	</table>
</div>

<div id="footer" class="row">
	<hr style="margin-bottom: 0;">
	<table style="width:100%;">
		<tr style="width:100%;">
			<td style="width:60%; font-size: 10px; text-align: left;"><?php echo $nome_sistema ?> Telefone: <?php echo $telefone_sistema ?></td>
			<td style="width:40%; font-size: 10px; text-align: right;"><p class="page">Página </p></td>
		</tr>
	</table>
</div>

<div id="content" style="margin-top: 0;">

	<table style="width: 100%; table-layout: fixed; font-size:8px; text-transform: uppercase;">
		<thead>
			<tbody>
				<?php 
				// Consulta para obter os dados dos usuários
				$query = $pdo->query("SELECT * FROM usuarios ORDER BY id DESC");
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				$linhas = count($res);

				if ($linhas > 0) {
					foreach ($res as $usuario) {
						$nome = $usuario['nome'];
						$email = $usuario['email'];
						$cbo = $usuario['cbo'];
						$cnsp = $usuario['cnsp'];
						$telefone = $usuario['telefone'];
						$data = strftime('%d de %B de %Y', strtotime($usuario['data'])); // Agora em português
				?>
						<tr>
							<td style="width:25%"><?php echo htmlspecialchars($nome) ?></td>
							<td style="width:25%"><?php echo htmlspecialchars($email) ?></td>
							<td style="width:15%"><?php echo htmlspecialchars($cbo) ?></td>
							<td style="width:15%"><?php echo htmlspecialchars($telefone) ?></td>
							<td style="width:15%"><?php echo $data ?></td>
						</tr>
				<?php 
					} 
				} 
				?>
			</tbody>
		</thead>
	</table>

</div>

<hr>
<table>
	<thead>
		<tbody>
			<tr>
				<td style="font-size: 10px; width:180px; text-align: right;"><b>Total de Usuários: <?php echo $linhas ?></b></td>
			</tr>
		</tbody>
	</thead>
</table>

</body>
</html>
