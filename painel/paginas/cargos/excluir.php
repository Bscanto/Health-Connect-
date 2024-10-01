<?php 
$tabela = 'cargos';
require_once("../../../conexao.php");

$id = $_POST['id'];

$query2 = $pdo->query("SELECT * from usuarios where nivel = '$id' ");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_acessos = @count($res2);
if($total_acessos > 0){
	echo 'Você precisa primeiro excluir os usuários/Profissionais para depois excluir o cargo relacionado!';
	exit();
}

$pdo->query("DELETE FROM $tabela WHERE id = '$id' ");
echo 'Excluído com Sucesso';
?>