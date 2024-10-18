<?php
session_start();
require_once("../../../conexao.php");


if (isset($_POST['quantidade'])) {
    $quantidade = $_POST['quantidade'];
    $servico = $_POST['servico'];
    $dataAcao = $_POST['dataAcao'];
    $classificacao = $_POST['classificacao'];
    $local_acao = $_POST['local_acao'];
    $descricao_procedimento = $_POST['descricao_procedimento'];
    $fk_acao_id = $_POST['fk_acao_id'];
    $fk_paciente_id = $_POST['fk_paciente_id'];

    
    
    $fk_usuarios_id = $_SESSION['id']; 
    $cbo = $_SESSION['cbo'];
    $cnsp = $_SESSION['cnsp'];

    try {
        $query = $pdo->prepare("INSERT INTO acao_realizada (quantidade, servico, data_acao, classificacao, cbo, cnsp, local_acao, descricao_procedimento, fk_acao_id, fk_usuarios_id, fk_paciente_id) 
                                VALUES (:quantidade, :servico, :data_acao, :classificacao, :cbo, :cnsp, :local_acao, :descricao_procedimento, :fk_acao_id, :fk_usuarios_id, :fk_paciente_id)");

        $query->bindParam(':quantidade', $quantidade);
        $query->bindParam(':servico', $servico);
        $query->bindParam(':data_acao', $dataAcao);
        $query->bindParam(':classificacao', $classificacao);
        $query->bindParam(':cbo', $cbo);
        $query->bindParam(':cnsp', $cnsp);
        $query->bindParam(':local_acao', $local_acao);
        $query->bindParam(':descricao_procedimento', $descricao_procedimento);
        $query->bindParam(':fk_acao_id', $fk_acao_id);
        $query->bindParam(':fk_usuarios_id', $fk_usuarios_id);
        $query->bindParam(':fk_paciente_id', $fk_paciente_id);

        $query->execute();
        echo "Ação realizada salva com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao salvar a ação realizada: " . $e->getMessage();
    }
} else {
    echo "Dados não recebidos!";
}
?>
