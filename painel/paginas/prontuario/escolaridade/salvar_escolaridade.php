<?php
require_once("../../../../conexao.php");

if (isset($_POST['paciente_id'])) {
    $id_paciente = $_POST['paciente_id'];
    $nome_escola = $_POST['nome_escola'];
    $serie = $_POST['serie'];
    $turno = $_POST['turno'];
    $tipo_escola = $_POST['tipo_escola'];
    $escolaridade_pai = $_POST['escolaridade_pai'];
    $escolaridade_mae = $_POST['escolaridade_mae'];
    $data_escol = $_POST['data_escol'];

    // Verifica se a escola já existe
$query_escola = $pdo->prepare("SELECT id FROM escola WHERE nome_escola = :nome_escola");
$query_escola->bindParam(':nome_escola', $nome_escola, PDO::PARAM_STR);
$query_escola->execute();
$escola = $query_escola->fetch(PDO::FETCH_ASSOC);

if ($escola) {
    // Se a escola já existe, recupera o ID
    $escola_id = $escola['id'];
} else {
    // Se a escola não existe, insere o novo registro na tabela 'escola'
    $insert_escola = $pdo->prepare("INSERT INTO escola (nome_escola) VALUES (:nome_escola)");
    $insert_escola->bindParam(':nome_escola', $nome_escola, PDO::PARAM_STR);
    $insert_escola->execute();

    // Recupera o ID da escola recém-criada
    $escola_id = $pdo->lastInsertId();
}

    // Atualizar ou adicionar escolaridade no banco
  // Agora, faz o update da tabela escolaridade usando o ID da escola
$query = $pdo->prepare("UPDATE escolaridade SET 
nome_escola = :nome_escola, 
serie = :serie, 
turno = :turno, 
tipo_escola = :tipo_escola,
escolaridade_pai = :escolaridade_pai, 
escolaridade_mae = :escolaridade_mae, 
data_escol = :data_escol,
fk_escola_id = :escola_id 
WHERE fk_paciente_id = :paciente_id");

    
    $query->bindParam(':nome_escola', $nome_escola);
    $query->bindParam(':serie', $serie);
    $query->bindParam(':turno', $turno);
    $query->bindParam(':tipo_escola', $tipo_escola);
    $query->bindParam(':escolaridade_pai', $escolaridade_pai);
    $query->bindParam(':escolaridade_mae', $escolaridade_mae);
    $query->bindParam(':data_escol', $data_escol);
    $query->bindParam(':paciente_id', $id_paciente, PDO::PARAM_INT);
    $query->execute();

    // Redirecionar de volta à página de escolaridade após salvar
   echo 'Salvo com Sucesso';
    exit;
} else {
    echo "Erro: Dados do paciente não fornecidos!";
}

