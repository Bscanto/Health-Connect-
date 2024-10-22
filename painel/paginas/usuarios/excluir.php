<?php 
session_start();
$tabela = 'usuarios';
require_once("../../../conexao.php");

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['foto'];

if($foto != "sem-foto.jpg"){
	@unlink('../../images/perfil/'.$foto);
}

if($nivel != "Administrador"){
	
// Primeiro, excluir as ações relacionadas ao usuário
$pdo->query("DELETE FROM acao_realizada WHERE fk_usuarios_id = $id");



$pdo->query("DELETE FROM $tabela WHERE id = '$id' ");
echo 'Excluído com Sucesso';

	}else{
		alert("Usuario Administrador não pode ser excluido!");
}