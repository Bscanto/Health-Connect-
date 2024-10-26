<?php


require_once("../../../conexao.php");


header('Content-Type: application/json');

if (isset($_POST['nomeFamiliar'], $_POST['idadeFamiliar'], $_POST['parentescoFamiliar'], $_POST['situacaoOcupacionalFamiliar'], $_POST['idPaciente'])) {
    $nome = $_POST['nomeFamiliar'];
    $idade = $_POST['idadeFamiliar'];
    $parentesco = $_POST['parentescoFamiliar'];
    $situacao_ocupacional = $_POST['situacaoOcupacionalFamiliar'];
    $id_paciente = $_POST['idPaciente'];

    echo $id_paciente;

    $stmt = $pdo->prepare("INSERT INTO grupo_familiar (nome, idade, parentesco, situacao_ocupacional, fk_paciente_id)
                           VALUES (:nome, :idade, :parentesco, :situacao_ocupacional, :fk_paciente_id)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':parentesco', $parentesco);
    $stmt->bindParam(':situacao_ocupacional', $situacao_ocupacional);
    $stmt->bindParam(':fk_paciente_id', $id_paciente);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao inserir dados"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Dados incompletos"]);
}

