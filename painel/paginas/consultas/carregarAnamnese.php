<?php

// Incluir a conexão com o banco de dados
require_once("../../../conexao.php");

// Obter o paciente_id da requisição GET
$paciente_id = $_GET['paciente_id'];

// Verificar se o paciente_id foi fornecido
if (empty($paciente_id)) {
    echo json_encode([]);
    exit;
}

try {
    // Consultar o id_anamnese mais recente para o paciente
    $stmtAnamnese = $pdo->prepare("SELECT id_anamnese FROM anamnese WHERE fk_paciente_id = :paciente_id ORDER BY data_anamnese DESC LIMIT 1");
    $stmtAnamnese->bindParam(':paciente_id', $paciente_id, PDO::PARAM_INT);
    $stmtAnamnese->execute();
    $anamnese = $stmtAnamnese->fetch(PDO::FETCH_ASSOC);

    if ($anamnese) {
        $anamnese_id = $anamnese['id_anamnese'];

        // Consultar os familiares associados a essa anamnese
        $stmtFamiliares = $pdo->prepare("SELECT nome, idade, parentesco, situacao_atual FROM grupo_familiar WHERE fk_anamnese_id_anamnese = :anamnese_id");
        $stmtFamiliares->bindParam(':anamnese_id', $anamnese_id, PDO::PARAM_INT);
        $stmtFamiliares->execute();
        $familiares = $stmtFamiliares->fetchAll(PDO::FETCH_ASSOC);

        // Retornar os dados em formato JSON
        echo json_encode($familiares);
    } else {
        // Nenhuma anamnese encontrada para o paciente
        echo json_encode([]);
    }
} catch (Exception $e) {
    // Em caso de erro, retornar um array vazio
    echo json_encode([]);
}
