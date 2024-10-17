<?php 

$tabela = 'itens_ana';

require_once("../../../conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$grupo = $_POST['grupo'];
$id = $_POST['id'];

//validacao nome
$query = $pdo->query("SELECT * from $tabela where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id != $id_reg){
	echo 'Nome já Cadastrado!';
	exit();
}

if($id == ""){
$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, descricao = :descricao, grupo = :grupo ");

}else{
$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, descricao = :descricao, grupo = :grupo where id = '$id'");
}
$query->bindValue(":nome", "$nome");
$query->bindValue(":descricao", "$descricao");
$query->bindValue(":grupo", "$grupo");

$query->execute();

echo 'Salvo com Sucesso';
