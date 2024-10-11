<?php
require_once("../../../conexao.php");

$paciente_id = $_POST['paciente_id'];
$escolaridade_pai = $_POST['escolaridade_pai'];
$escolaridade_mae = $_POST['escolaridade_mae'];
$tipo_escola = $_POST['tipo_escola'];
$turno = $_POST['turno'];
$serie = $_POST['serie'];
$data_escolaridade = $_POST['data_escolaridade'];

// Verifica se já existe um registro de escolaridade para o paciente
$query = $pdo->prepare("SELECT * FROM escolaridade WHERE fk_paciente_id = :paciente_id");
$query->bindValue(':paciente_id', $paciente_id);
$query->execute();
$res = $query->fetch(PDO::FETCH_ASSOC);

if ($res) {
    // Atualiza os dados de escolaridade existentes
    $query = $pdo->prepare("UPDATE escolaridade SET
        escolaridade_pai = :escolaridade_pai,
        escolaridade_mae = :escolaridade_mae,
        tipo_escola = :tipo_escola,
        turno = :turno,
        serie = :serie,
        data_escolaridade = :data_escolaridade
        WHERE fk_paciente_id = :paciente_id");
} else {
    // Insere novos dados de escolaridade
    $query = $pdo->prepare("INSERT INTO escolaridade SET
        fk_paciente_id = :paciente_id,
        escolaridade_pai = :escolaridade_pai,
        escolaridade_mae = :escolaridade_mae,
        tipo_escola = :tipo_escola,
        turno = :turno,
        serie = :serie,
        data_escolaridade = :data_escolaridade");
}

$query->bindValue(':paciente_id', $paciente_id);
$query->bindValue(':escolaridade_pai', $escolaridade_pai);
$query->bindValue(':escolaridade_mae', $escolaridade_mae);
$query->bindValue(':tipo_escola', $tipo_escola);
$query->bindValue(':turno', $turno);
$query->bindValue(':serie', $serie);
$query->bindValue(':data_escolaridade', $data_escolaridade);
$query->execute();

echo 'Dados de Escolaridade Salvos com Sucesso';
?>
