<?php
require_once("../../../conexao.php");

$paciente_id = $_POST['paciente_id'];

// Busca os dados de escolaridade para o paciente específico, incluindo os dados da escola
$query = $pdo->prepare("SELECT 
        escolaridade.id,
        escolaridade.escolaridade_pai,
        escolaridade.tipo_escola,
        escolaridade.turno,
        escolaridade.serie,
        escolaridade.data_escol,
        escolaridade.escolaridade_mae,
        escolaridade.fk_escola_id,
        escolaridade.fk_paciente_id,
        escola.nome_escola 
        
    FROM 
        escolaridade 
    LEFT JOIN 
        escola ON escolaridade.fk_escola_id = escola.id
    WHERE 
        escolaridade.fk_paciente_id = :paciente_id
");
$query->bindValue(':paciente_id', $paciente_id);
$query->execute();
$res = $query->fetch(PDO::FETCH_ASSOC);

// Retorna os dados como JSON
echo json_encode($res);
$turno = $_POST['turno'];

echo $turno; // Para verificar se o valor está sendo capturado corretamente
exit();


