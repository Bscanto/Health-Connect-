<?php 


include('../../conexao.php');
include('data_formatada.php');

$id = $_GET['id'];
$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];
$obs = urldecode($_GET['obs']); 
$motivo = urldecode($_GET['motivo']); 
$id_usuario = @$_GET['id_usuario']; 



$query = $pdo->query("SELECT * FROM usuarios where id = '$id_usuario' order by id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_Profissional = $res[0]['nome'];



$dataInicialF = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFinalF = implode('/', array_reverse(explode('-', $dataFinal)));

$datas = ($dataInicial == $dataFinal) ? $dataInicialF : $dataInicialF . ' até ' . $dataFinalF;

// Consulta para obter os dados do paciente
$query2 = $pdo->prepare("SELECT * FROM paciente WHERE id = :id");
$query2->execute([':id' => $id]);
$res2 = $query2->fetch(PDO::FETCH_ASSOC);

if ($res2) {
	$nome_paciente = $res2['nome'];
	$telefone_paciente = $res2['telefone'];
	$endereco_paciente = $res2['endereco'];
	$data_nasc = $res2['data_nasc'];
	$nome_responsavel = $res2['nome_responsavel'];
	$sexo = $res2['sexo'];
	$cpf_paciente = $res2['cpf'];

	// Calcular idade do paciente
	list($ano, $mes, $dia) = explode('-', $data_nasc);
	$hoje = new DateTime();
	$nascimento = new DateTime("$ano-$mes-$dia");
	$idade = $hoje->diff($nascimento)->y;
	$data_nascF = implode('/', array_reverse(explode('-', $data_nasc)));
}

// Calcular diferença em dias entre as datas
$data_inicio = new DateTime($dataInicial);
$data_fim = new DateTime($dataFinal);
$dateInterval = $data_inicio->diff($data_fim);
$dias = $dateInterval->days;

?>

<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.cdnfonts.com/css/tw-cen-mt-condensed');
@page { margin: 145px 20px 25px 20px; }
#header { position: fixed; left: 0px; top: -110px; bottom: 100px; right: 0px; height: 35px; text-align: center; padding-bottom: 100px; }
#content {margin-top: 0px;}
#footer { position: fixed; left: 0px; bottom: -60px; right: 0px; height: 80px; }
#footer .page:after {content: counter(page, my-sec-counter);}
body {font-family: 'Tw Cen MT', sans-serif;}

.marca {
	position: fixed;
	left: 50;
	top: 130;
	width: 80%;
	opacity: 10%;
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
				<td style="border: 1px solid #000; width: 20%; text-align: left;">
					<img style="margin-top: 5px; margin-left: 7px;" id="imag" src="<?php echo $url_sistema ?>img/logo.jpg" width="140px">
				</td>
				<td style="width: 20%; text-align: left; font-size: 13px;">
				</td>
				<td style="width: 5%; text-align: center; font-size: 13px;">
				</td>
				<td style="width: 55%; text-align: right; font-size: 9px; padding-right: 10px;">
					<b><big>ATESTADO MÉDICO</big></b><br>
					<br>
					<?php echo mb_strtoupper($data_hoje) ?>
				</td>
			</tr>		
		</table>
	</div>
	<br>
	<div align="center" style="margin-top: 25px; margin-bottom: 10px; border-bottom: 1px solid #000; font-size:17px"><b>ATESTADO MÉDICO</b></div>
</div>

<div id="footer" class="row">
	<hr style="margin-bottom: 0;">
	<table style="width:100%;">
		<tr style="width:100%;">
			<td style="width:60%; font-size: 10px; text-align: left;"><?php echo $nome_sistema ?> / Telefone: <?php echo $telefone_sistema ?> / Email: <?php echo $email_sistema ?></td>
			<td style="width:40%; font-size: 10px; text-align: right;"></td>
		</tr>
	</table>
</div>

<div id="content" style="margin-top: 70px;">
	<div style="font-size: 15px;">
		Atesto para os devidos fins que o Sr(a) <b><?php echo $nome_paciente ?></b>, portador do CPF <?php echo $cpf_paciente ?>, esteve em consulta neste dia <?php echo $data_hoje ?> e deverá se afastar de suas atividades pelo período de <?php echo $datas ?> <b>(<?php echo $dias ?> Dias)</b> por motivo de <?php echo $motivo ?>.
	</div>

	<?php if ($obs != "") { ?>
		<div style="margin-top: 20px; border:1px solid #000; font-size: 14px; padding:5px">
			<b>Informações Relevantes</b>
			<p style="font-size: 13px"><?php echo $obs ?></p>
		</div>
	<?php } ?>

	<div style="margin-top: 80px; font-size:13px" align="center">
		__________________________________________________
		<br>
		<?php echo $nome_Profissional ?>
	</div>
</div>

</body>
</html>
