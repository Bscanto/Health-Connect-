<?php
require_once("../../../../conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $id_atendimento = $_POST['id_atendimento'] ?? null; // Captura o ID do atendimento (caso exista)
    $cid_principal = $_POST['cid_principal'];
    $diagnostico_principal = $_POST['diagnostico_principal'];
    $cid_secundario = $_POST['cid_secundario'];
    $diagnostico_secundario = $_POST['diagnostico_secundario'];
    $usuario_substancia = $_POST['usuario_substancia'];
    $tipo_substancia = $_POST['tipo_substancia'];
    $continua_atencao_basica = $_POST['continua_atencao_basica'];
    $continua_capsi = $_POST['continua_capsi'];
    $conclusao = $_POST['conclusao'];
    $origem_paciente = $_POST['origem_paciente'];

    try {
        // Se $id_atendimento estiver definido, atualiza o atendimento existente
        if ($id_atendimento) {
            $query = $pdo->prepare("UPDATE dados_atendimento SET 
                cid_principal = :cid_principal,
                diagnostico_principal = :diagnostico_principal,
                cid_secundario = :cid_secundario,
                diagnostico_secundario = :diagnostico_secundario,
                usuario_substancia = :usuario_substancia,
                tipo_substancia = :tipo_substancia,
                continua_atencao_basica = :continua_atencao_basica,
                continua_capsi = :continua_capsi,
                conclusao = :conclusao,
                origem_paciente = :origem_paciente
            WHERE id_atendimento = :id_atendimento");

            $query->bindParam(':id_atendimento', $id_atendimento, PDO::PARAM_INT);
        } else {
            // Se não existir um ID, insere um novo atendimento
            $query = $pdo->prepare("INSERT INTO dados_atendimento 
                (cid_principal, diagnostico_principal, cid_secundario, diagnostico_secundario, usuario_substancia, tipo_substancia, continua_atencao_basica, continua_capsi, conclusao, origem_paciente) 
                VALUES 
                (:cid_principal, :diagnostico_principal, :cid_secundario, :diagnostico_secundario, :usuario_substancia, :tipo_substancia, :continua_atencao_basica, :continua_capsi, :conclusao, :origem_paciente)");
        }

        // Vinculando os parâmetros
        $query->bindParam(':cid_principal', $cid_principal);
        $query->bindParam(':diagnostico_principal', $diagnostico_principal);
        $query->bindParam(':cid_secundario', $cid_secundario);
        $query->bindParam(':diagnostico_secundario', $diagnostico_secundario);
        $query->bindParam(':usuario_substancia', $usuario_substancia);
        $query->bindParam(':tipo_substancia', $tipo_substancia);
        $query->bindParam(':continua_atencao_basica', $continua_atencao_basica);
        $query->bindParam(':continua_capsi', $continua_capsi);
        $query->bindParam(':conclusao', $conclusao);
        $query->bindParam(':origem_paciente', $origem_paciente);

        // Executa a query
        $query->execute();

        // Mensagem de sucesso
        echo "Atendimento salvo com sucesso!";
        echo "<script>window.location='/painel/paginas/prontuario2.php'</script>";
exit;

        // Redirecionar ou mostrar uma mensagem
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido.";
}
?>
