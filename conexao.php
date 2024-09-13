<?php 

//CONEXÃO LOCAL COM O BANCO DE DADOS
$servidor = 'localhost';
$banco = 'health';
$usuario = 'root';
$senha = '';

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro ao conectar ao banco de dados!<br>';
}


//VARIAB=VEIS GLOBAIS
$nome_sistema = 'Health Connect';
$nome = "Bruno";
$email = "bsccanto@gmail.com";
$telefone = "5599999999";

?>