<?php
// salvarAnamnese.php

// Incluir a conexão com o banco de dados

require_once("../../../conexao.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $parentesco = $_POST['parentesco'];
    $situacao = $_POST['situacao'];
    $paciente_id = $_POST['id'];

    var_dump($paciente_id);

    // Query de inserção no banco de dados
    $query = "INSERT INTO grupo_familiar (nome, idade, parentesco, situacao_atual) VALUES ('$nome', '$idade', '$parentesco', '$situacao')";

    if (mysqli_query($conn, $query)) {
        echo "Familiar salvo com sucesso!";
    } else {
        echo "Erro ao salvar familiar: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}

// Query para buscar membros do grupo familiar
$query = "SELECT nome, idade, parentesco, situacao_atual FROM grupo_familiar WHERE fk_anamnese_id_anamnese = $id_anamnese";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['nome']}</td>
            <td>{$row['idade']}</td>
            <td>{$row['parentesco']}</td>
            <td>{$row['situacao_atual']}</td>
          </tr>";
}
?>
