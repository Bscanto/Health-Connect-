<?php

require_once("../../../conexao.php");

$id_paciente = $_POST['idPaciente'];

// Busca todas as ações realizadas para o paciente específico
$query = $pdo->prepare("SELECT ar.*, a.descricao AS acao_descricao, u.cbo AS cbo_executante, u.nome AS nome_executante
                        FROM acao_realizada ar 
                        JOIN acao a ON ar.fk_acao_id = a.id
                        JOIN usuarios u ON ar.fk_usuarios_id = u.id
                        WHERE ar.fk_paciente_id = :id_paciente
                        ORDER BY ar.data_acao DESC"); // Ordenando por data de ação, mais recente primeiro
$query->bindParam(':id_paciente', $id_paciente);
$query->execute();
$acoes = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($acoes) > 0) {
    echo "<div class='accordion' id='acoesRealizadasAccordion'>";

    foreach ($acoes as $index => $acao) {
        $accordionId = "collapse" . $index;
        echo "
        <div class='card'>
            <div class='card-header' id='heading$index'>
                <h2 class='mb-0'>
                    <button class='btn btn-link text-primary' type='button' data-toggle='collapse' data-target='#$accordionId' aria-expanded='true' aria-controls='$accordionId'>
                        Ação: " . htmlspecialchars($acao['acao_descricao']) . " - Data: " . date('d/m/Y', strtotime($acao['data_acao'])) . "
                    </button>
                </h2>
            </div>

            <div id='$accordionId' class='collapse' aria-labelledby='heading$index' data-parent='#acoesRealizadasAccordion'>
                <div class='card-body text-primary'>
                    <strong>Quantidade:</strong> " . htmlspecialchars($acao['quantidade']) . "<br>
                    <strong>Serviço:</strong> " . htmlspecialchars($acao['servico']) . "<br>
                    <strong>Classificação:</strong> " . htmlspecialchars($acao['classificacao']) . "<br>
                    <strong>Local:</strong> " . htmlspecialchars($acao['local_acao']) . "<br>
                    <strong>CBO do Executante:</strong> " . htmlspecialchars($acao['cbo_executante']) . "<br>
                    <strong>Nome do Executante:</strong> " . htmlspecialchars($acao['nome_executante']) . "<br>
                    <strong>Descrição:</strong> " . htmlspecialchars($acao['descricao_procedimento']) . "<br>
                    <strong>Data da Ação:</strong> " . date('d/m/Y', strtotime($acao['data_acao'])) . "<br>
                </div>
            </div>
        </div>
        <hr>
        <br>
        ";
    }

    echo "</div>";
} else {
    echo "<p class='alert alert-info'>Nenhuma ação realizada foi encontrada para este paciente.</p>";
}
?>
