<?php 
//DEFINIÇÃO DE FUSO HORÁRIO
date_default_timezone_set('America/Sao_Paulo');

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

//VARIAVEIS GLOBAIS
$nome_sistema = 'Health Connect';
$nome = "Bruno";
$email_sistema = "bsccanto@gmail.com";
$telefone_sistema = "5599999999";

?>