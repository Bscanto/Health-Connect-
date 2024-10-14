<?php
// salvarAnamnese.php

// Incluir a conexão com o banco de dados

require_once("../../../conexao.php");

// Obter os dados enviados pelo formulário
$grupoFamiliarData = $_POST['grupoFamiliarData'];
$paciente_id = $_POST['fk_paciente_id'];

// Verificar se o paciente_id foi recebido
if (empty($paciente_id)) {
    echo "Erro: ID do paciente não recebido.";
    exit;
}

// Verificar se os dados do grupo familiar foram recebidos
if (empty($grupoFamiliarData)) {
    echo "Erro: Dados do grupo familiar não recebidos.";
    exit;
}

// Decodificar o JSON em um array associativo
$grupoFamiliarArray = json_decode($grupoFamiliarData, true);

// Verificar se a decodificação foi bem-sucedida
if ($grupoFamiliarArray === null) {
    echo "Erro: Falha ao decodificar os dados do grupo familiar.";
    exit;
}

// Depuração: Exibir dados recebidos
echo "Dados recebidos:";
var_dump($grupoFamiliarArray);
echo "Paciente ID: $paciente_id";

try {
    // Iniciar transação
    $pdo->beginTransaction();

    // Inserir na tabela 'anamnese'
    $stmtAnamnese = $pdo->prepare("INSERT INTO anamnese (data_anamnese, fk_paciente_id) VALUES (NOW(), :fk_paciente_id)");
    $stmtAnamnese->bindParam(':fk_paciente_id', $paciente_id, PDO::PARAM_INT);
    $stmtAnamnese->execute();

    // Verificar se a inserção foi bem-sucedida
    if ($stmtAnamnese->rowCount() > 0) {
        echo "Anamnese inserida com sucesso.";
    } else {
        echo "Erro ao inserir anamnese.";
        $pdo->rollBack();
        exit;
    }

    // Obter o ID da anamnese inserida
    $anamnese_id = $pdo->lastInsertId();
    echo "ID da anamnese: $anamnese_id";

    // Preparar a inserção na tabela 'grupo_familiar'
    $stmtGrupoFamiliar = $pdo->prepare("INSERT INTO grupo_familiar (nome, idade, parentesco, situacao_atual, fk_anamnese_id_anamnese) VALUES (:nome, :idade, :parentesco, :situacao_atual, :fk_anamnese_id_anamnese)");

    foreach ($grupoFamiliarArray as $familiar) {
        $stmtGrupoFamiliar->bindParam(':nome', $familiar['nome']);
        $stmtGrupoFamiliar->bindParam(':idade', $familiar['idade'], PDO::PARAM_INT);
        $stmtGrupoFamiliar->bindParam(':parentesco', $familiar['parentesco']);
        $stmtGrupoFamiliar->bindParam(':situacao_atual', $familiar['situacao_ocupacional']);
        $stmtGrupoFamiliar->bindParam(':fk_anamnese_id_anamnese', $anamnese_id, PDO::PARAM_INT);
        $stmtGrupoFamiliar->execute();

        // Verificar se a inserção foi bem-sucedida
        if ($stmtGrupoFamiliar->rowCount() > 0) {
            echo "Familiar '{$familiar['nome']}' inserido com sucesso.";
        } else {
            echo "Erro ao inserir familiar '{$familiar['nome']}'.";
            $pdo->rollBack();
            exit;
        }
    }

    // Confirmar transação
    $pdo->commit();
    echo "Transação confirmada com sucesso.";
    echo "Salvo com Sucesso";
} catch (Exception $e) {
    // Reverter transação em caso de erro
    $pdo->rollBack();
    echo "Erro ao salvar anamnese: " . $e->getMessage();
}
?>
