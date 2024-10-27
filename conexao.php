<?php 

//definir fuso horário
date_default_timezone_set('America/Sao_Paulo');

$url_sistema = "http://$_SERVER[HTTP_HOST]/";
$url = explode("//", $url_sistema);
if($url[1] == 'localhost/'){
	$url_sistema = "http://$_SERVER[HTTP_HOST]/projeto/";
}

//dados conexão bd local
$servidor = 'localhost';
$banco = 'health';
$usuario = 'root';
$senha = '';

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro ao conectar ao banco de dados!<br>';
	echo $e;
}


//variaveis globais
$nome_sistema = 'Health Connect';
$email_sistema = 'bsccanto@gmail.com';
$telefone_sistema = '(55)99621-4645';
$url_sistema = 'http://localhost/Health-Connect-/';

$query = $pdo->query("SELECT * from config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
if($linhas == 0){
	$pdo->query("INSERT INTO config SET nome = '$nome_sistema', email = '$email_sistema', telefone = '$telefone_sistema', logo = 'logo.png', logo_rel = 'logo.jpg', icone = 'icone.png', ativo = 'Sim', marca_dagua='Sim'");
}else{
$nome_sistema = $res[0]['nome'];
$email_sistema = $res[0]['email'];
$telefone_sistema = $res[0]['telefone'];
$endereco_sistema = $res[0]['endereco'];
$instagram_sistema = $res[0]['instagram'];
$logo_sistema = $res[0]['logo'];
$logo_rel = $res[0]['logo_rel'];
$icone_sistema = $res[0]['icone'];
$ativo_sistema = $res[0]['ativo'];
$marca_dagua = $res[0]['marca_dagua'];

if($ativo_sistema != 'Sim' and $ativo_sistema != ''){ ?>
	<style type="text/css">
		@media only screen and (max-width: 700px) {
  .imgsistema_mobile{
    width:300px;
  }
    
}
	</style>
	<div style="text-align: center; margin-top: 100px">
	<img src="img/bloqueio.png" class="imgsistema_mobile">	
	</div>
<?php 
exit();
} 

}	

$total_profissional = $pdo->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
$total_paciente = $pdo->query("SELECT COUNT(*) FROM paciente")->fetchColumn();
$total_acao = $pdo->query("SELECT COUNT(*) FROM acao_realizada")->fetchColumn();
$total_anamnese = $pdo->query("SELECT COUNT(*) FROM anamnese")->fetchColumn();


$total_acoes_hoje = $pdo->query("SELECT COUNT(*) 
                                 FROM acao_realizada 
                                 WHERE DATE(data_acao) = CURDATE()")->fetchColumn();


$total_atendimentos_mes = $pdo->query("SELECT COUNT(*) 
                                       FROM acao_realizada 
                                       WHERE MONTH(data_acao) = MONTH(CURDATE()) 
                                       AND YEAR(data_acao) = YEAR(CURDATE())")->fetchColumn();


$total_atendimentos_ano = $pdo->query("SELECT COUNT(*) 
                                       FROM acao_realizada 
                                       WHERE YEAR(data_acao) = YEAR(CURDATE())")->fetchColumn();






 ?>
