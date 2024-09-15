<?php 
require_once("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT * from usuarios where email = :email and senha = :senha");

$query->bindValue(":email", "$usuario");
$query->bindValue(":senha", "$senha");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($res);

if($linhas > 0){

}else{
	echo '<script>window.alert("Dados Incorretos!!")</script>'; 
	echo '<script>window.location="index.php"</script>';  
}

?>