<?php
require_once("../../../conexao.php");

$paciente_id = $_POST['paciente_id'];

// Busca os dados de escolaridade para o paciente específico
$query = $pdo->prepare("SELECT * FROM escolaridade WHERE fk_paciente_id = :paciente_id");
$query->bindValue(':paciente_id', $paciente_id);
$query->execute();
$res = $query->fetch(PDO::FETCH_ASSOC);

echo json_encode($res);
?>
