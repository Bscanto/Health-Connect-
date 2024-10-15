<?php

// Incluir a conexão com o banco de dados
require_once("../../../conexao.php");

$grupoFamiliarData = $_POST['grupoFamiliarData'];
$paciente_id = $_POST['fk_paciente_id'];

// Verificar se o paciente_id foi recebido
if (empty($paciente_id)) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro: ID do paciente não recebido.']);
    exit;
}

// Verificar se os dados do grupo familiar foram recebidos
if (empty($grupoFamiliarData)) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro: Dados do grupo familiar não recebidos.']);
    exit;
}

// Decodificar o JSON em um array associativo
$grupoFamiliarArray = json_decode($grupoFamiliarData, true);
if ($grupoFamiliarArray === null) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro: Falha ao decodificar os dados do grupo familiar.']);
    exit;
}

try {
    // Iniciar transação
    $pdo->beginTransaction();

    // Inserir na tabela 'anamnese'
    $stmtAnamnese = $pdo->prepare("INSERT INTO anamnese (data_anamnese, fk_paciente_id) VALUES (NOW(), :fk_paciente_id)");
    $stmtAnamnese->bindParam(':fk_paciente_id', $paciente_id, PDO::PARAM_INT);
    $stmtAnamnese->execute();

    // Obter o ID da anamnese inserida
    $anamnese_id = $pdo->lastInsertId();

    // 1. Salvando Grupo Familiar
    $stmtGrupoFamiliar = $pdo->prepare("INSERT INTO grupo_familiar (nome, idade, parentesco, situacao_atual, fk_anamnese_id_anamnese) VALUES (:nome, :idade, :parentesco, :situacao_atual, :fk_anamnese_id_anamnese)");
    foreach ($grupoFamiliarArray as $familiar) {
        $stmtGrupoFamiliar->bindParam(':nome', $familiar['nome']);
        $stmtGrupoFamiliar->bindParam(':idade', $familiar['idade'], PDO::PARAM_INT);
        $stmtGrupoFamiliar->bindParam(':parentesco', $familiar['parentesco']);
        $stmtGrupoFamiliar->bindParam(':situacao_atual', $familiar['situacao_ocupacional']);
        $stmtGrupoFamiliar->bindParam(':fk_anamnese_id_anamnese', $anamnese_id, PDO::PARAM_INT);
        $stmtGrupoFamiliar->execute();
    }

    // 2. Salvando Revisão de Saúde
    $stmtRevisaoSaude = $pdo->prepare("INSERT INTO revisao_saude (ubs_pre_natal, pediatra_clinico, clinico, quantas_semana, fk_anamnese_id_anamnese) VALUES (:ubs_pre_natal, :pediatra_clinico, :clinico, :quantas_semana, :fk_anamnese_id_anamnese)");
    $stmtRevisaoSaude->bindParam(':ubs_pre_natal', $_POST['ubsPreNatal']);
    $stmtRevisaoSaude->bindParam(':pediatra_clinico', $_POST['pediatraClinico']);
    $stmtRevisaoSaude->bindParam(':clinico', $_POST['clinico']);
    $stmtRevisaoSaude->bindParam(':quantas_semana', $_POST['quantasSemanas']);
    $stmtRevisaoSaude->bindParam(':fk_anamnese_id_anamnese', $anamnese_id, PDO::PARAM_INT);
    $stmtRevisaoSaude->execute();

    // 3. Salvando Hábitos de Vida
    $stmtHabitos = $pdo->prepare("INSERT INTO habitos (sono, quem_compartilha, quarto, fk_anamnese_id_anamnese) VALUES (:sono, :quem_compartilha, :quarto, :fk_anamnese_id_anamnese)");
    $stmtHabitos->bindParam(':sono', $_POST['sono']);
    $stmtHabitos->bindParam(':quem_compartilha', $_POST['quemCompartilha']);
    $stmtHabitos->bindParam(':quarto', $_POST['quarto']);
    $stmtHabitos->bindParam(':fk_anamnese_id_anamnese', $anamnese_id, PDO::PARAM_INT);
    $stmtHabitos->execute();

    // 4. Salvando Histórico de Dependência Química
    $stmtDependencia = $pdo->prepare("INSERT INTO historico_dependencia (qual_substancia, subtancia_gestacao, qual_medicamento, medicamento_controlado, fk_anamnese_id_anamnese) VALUES (:qual_substancia, :subtancia_gestacao, :qual_medicamento, :medicamento_controlado, :fk_anamnese_id_anamnese)");
    $stmtDependencia->bindParam(':qual_substancia', $_POST['qualSubstancia']);
    $stmtDependencia->bindParam(':subtancia_gestacao', $_POST['substanciaGestacao']);
    $stmtDependencia->bindParam(':qual_medicamento', $_POST['qualMedicamento']);
    $stmtDependencia->bindParam(':medicamento_controlado', $_POST['medicamentoControlado']);
    $stmtDependencia->bindParam(':fk_anamnese_id_anamnese', $anamnese_id, PDO::PARAM_INT);
    $stmtDependencia->execute();

    // 5. Salvando Histórico de Agressões
    $stmtAgressao = $pdo->prepare("INSERT INTO historico_agressao (historico_agressao, Qual_agressao, fk_anamnese_id_anamnese) VALUES (:historico_agressao, :Qual_agressao, :fk_anamnese_id_anamnese)");
    $stmtAgressao->bindParam(':historico_agressao', $_POST['historicoAgressao']);
    $stmtAgressao->bindParam(':Qual_agressao', $_POST['qualAgressao']);
    $stmtAgressao->bindParam(':fk_anamnese_id_anamnese', $anamnese_id, PDO::PARAM_INT);
    $stmtAgressao->execute();

    // 6. Salvando Histórico de Saúde Mental
    $stmtMental = $pdo->prepare("INSERT INTO historico_mental (historico_mental, grau_parentesco, fk_anamnese_id_anamnese) VALUES (:historico_mental, :grau_parentesco, :fk_anamnese_id_anamnese)");
    $stmtMental->bindParam(':historico_mental', $_POST['historicoMental']);
    $stmtMental->bindParam(':grau_parentesco', $_POST['grauParentesco']);
    $stmtMental->bindParam(':fk_anamnese_id_anamnese', $anamnese_id, PDO::PARAM_INT);
    $stmtMental->execute();

    // Confirmar transação
    $pdo->commit();

    // Retornar mensagem de sucesso
    echo json_encode(['status' => 'sucesso', 'mensagem' => 'Salvo com Sucesso']);
} catch (Exception $e) {
    // Reverter transação em caso de erro
    $pdo->rollBack();
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao salvar anamnese: ' . $e->getMessage()]);
}
?>
