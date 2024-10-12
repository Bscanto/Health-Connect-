<?php

require_once("../../../conexao.php");

$paciente_id = $_POST['paciente_id'];
$escolaridade_pai = $_POST['escolaridade_pai'];
$escolaridade_mae = $_POST['escolaridade_mae'];
$tipo_escola = $_POST['tipo_escola'];
$turno = $_POST['turno'];
$serie = $_POST['serie'];
$data_escol = $_POST['data_escolaridade'];  // Data de escolaridade
$escola_id = $_POST['nome_escola'];  // ID da escola selecionada (assumindo que o ID está no campo nome_escola)

// Verifica se todos os campos obrigatórios estão preenchidos
try {
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
            data_escol = :data_escol, 
            fk_escola_id = :escola_id
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
            data_escol = :data_escol, 
            fk_escola_id = :escola_id");
    }

    // Atribuindo os valores
    $query->bindValue(':paciente_id', $paciente_id);
    $query->bindValue(':escolaridade_pai', $escolaridade_pai);
    $query->bindValue(':escolaridade_mae', $escolaridade_mae);
    $query->bindValue(':tipo_escola', $tipo_escola); // Aqui estamos enviando o tipo de escola
    $query->bindValue(':turno', $turno);
    $query->bindValue(':serie', $serie);
    $query->bindValue(':data_escol', $data_escol);  // Corrigido para o nome correto da coluna
    $query->bindValue(':escola_id', $escola_id);  // Aqui estamos enviando o ID da escola
    $query->execute();

    echo 'Dados de Escolaridade Salvos com Sucesso';
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}
