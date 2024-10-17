<?php 

require_once("../../../conexao.php");

$id_pac = $_POST['paciente'];
$id_item = $_POST['id'];
$desc = $_POST['desc'];

$query = $pdo->query("SELECT * FROM itens_ana where id = '$id_item'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_grupo = $res[0]['grupo'];


$query = $pdo->query("SELECT * FROM anamnese where item = '$id_item' and paciente = '$id_pac'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$pdo->query("UPDATE anamnese SET descricao = '$desc' where item = '$id_item' and paciente = '$id_pac'");
}else{
	if($desc == ""){
		exit();
	}
	$pdo->query("INSERT INTO anamnese SET item = '$id_item', paciente = '$id_pac', descricao = '$desc', grupo = '$id_grupo'");
}
