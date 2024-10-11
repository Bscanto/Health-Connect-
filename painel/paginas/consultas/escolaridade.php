<?php
require_once("../../../conexao.php");

// Verificar se o ID foi enviado via POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Consulta SQL para buscar todos os dados do paciente e escolaridade
    $sql = "SELECT 
                p.id,
                p.nome,
                p.cpf,
                p.telefone,
                p.email,
                p.ativo,
                p.estado,
                p.cidade,
                p.bairro,
                p.endereco,
                p.cep,
                p.numero,
                p.data_nasc,
                p.sexo,
                p.cns,
                p.nome_responsavel,
                p.nome_pai,
                p.ocupacao_pai,
                p.nome_mae,
                p.ocupacao_mae,
                p.celular,
                p.raca,
                p.nacionalidade,
                p.queixa,
                p.data_cad,
                e.escolaridade_pai,
                e.escolaridade_mae,
                e.tipo_escola,
                e.turno,
                e.serie,
                e.data_escol AS data_escolaridade,
                esc.nome_escola
            FROM paciente p
            LEFT JOIN escolaridade e ON e.fk_paciente_id = p.id
            LEFT JOIN escola esc ON e.fk_escola_id = esc.id
            WHERE p.id = :id";
    
    // Preparar e executar a consulta
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Buscar o resultado
    $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar se os dados foram encontrados
    if ($paciente) {
        echo json_encode($paciente);  // Retornar os dados como JSON
    } else {
        echo json_encode(['erro' => 'Paciente não encontrado.']);
    }
}
?>
