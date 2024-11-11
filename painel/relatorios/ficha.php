<?php 

include('../../conexao.php');
include('data_formatada.php');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$id = $_GET['id_pac'];

// Dados do paciente
$queryPaciente = $pdo->query("SELECT * FROM paciente WHERE id = '$id'");
$paciente = $queryPaciente->fetch(PDO::FETCH_ASSOC);

if ($paciente) {
    $nome_paciente = $paciente['nome'];
    $telefone_paciente = $paciente['telefone'];
    $celular_paciente = $paciente['celular'];
    $email_paciente = $paciente['email'];
    $cns = $paciente['cns'];
    $cpf = $paciente['cpf'];
    $data_nasc = $paciente['data_nasc'];
    $sexo = $paciente['sexo'];
    $raca = $paciente['raca'];
    $nacionalidade = $paciente['nacionalidade'];
    $data_cad = $paciente['data_cad'];
    $idade = date_diff(date_create($data_nasc), date_create('today'))->y;

    // Endereço
    $endereco = $paciente['endereco'];
    $numero = $paciente['numero'];
    $bairro = $paciente['bairro'];
    $cidade = $paciente['cidade'];
    $estado = $paciente['estado'];
    $cep = $paciente['cep'];

    // Informações dos pais e responsável
    $nome_responsavel = $paciente['nome_responsavel'];
    $nome_mae = $paciente['nome_mae'];
    $ocupacao_mae = $paciente['ocupacao_mae'];
    $nome_pai = $paciente['nome_pai'];
    $ocupacao_pai = $paciente['ocupacao_pai'];
    $queixa = $paciente['queixa'];

    // Escolaridade
    $escolaridade_pai = $paciente['escolaridade_pai'];
    $escolaridade_mae = $paciente['escolaridade_mae'];
    $turno = $paciente['turno'];
    $serie = $paciente['serie'];
    $tipo_escola = $paciente['tipo_escola'];
    $nome_escola = $paciente['nome_escola'];
}

// Anamnese
$queryAnamnese = $pdo->query("SELECT * FROM anamnese WHERE paciente = '$id'");
$anamneses = $queryAnamnese->fetchAll(PDO::FETCH_ASSOC);

// Histórico clínico
$queryHistorico = $pdo->query("SELECT * FROM acao_realizada WHERE paciente = '$id' ORDER BY id DESC");
$historicos = $queryHistorico->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.cdnfonts.com/css/tw-cen-mt-condensed');
        @page { margin: 145px 20px 25px 20px; }
        body { font-family: 'Tw Cen MT', sans-serif; font-size: 12px; }
        .header, .footer, .section-title { font-weight: bold; }
        .section { margin-bottom: 10px; border-bottom: 1px solid #000; padding-bottom: 5px; }
        .content { margin-top: 10px; }
        .info { margin-right: 20px; }
    </style>
</head>

<body>

<div class="header">
    <h3>FICHA DO PACIENTE</h3>
    <p>Data de Cadastro: <?php echo date('d/m/Y', strtotime($data_cad)) ?></p>
</div>

<div class="section">
    <div class="section-title">Informações Pessoais</div>
    <p><span class="info"><b>Nome:</b> <?php echo $nome_paciente ?></span>
    <span class="info"><b>CNS:</b> <?php echo $cns ?></span>
    <span class="info"><b>Email:</b> <?php echo $email_paciente ?></span></p>
    <p><span class="info"><b>CPF:</b> <?php echo $cpf ?></span>
    <span class="info"><b>Telefone:</b> <?php echo $telefone_paciente ?></span>
    <span class="info"><b>Celular:</b> <?php echo $celular_paciente ?></span></p>
    <p><span class="info"><b>Data Nascimento:</b> <?php echo date('d/m/Y', strtotime($data_nasc)) ?></span>
    <span class="info"><b>Sexo:</b> <?php echo $sexo ?></span>
    <span class="info"><b>Raça/Cor:</b> <?php echo $raca ?></span>
    <span class="info"><b>Nacionalidade:</b> <?php echo $nacionalidade ?></span></p>
</div>

<div class="section">
    <div class="section-title">Endereço</div>
    <p><span class="info"><b>Endereço:</b> <?php echo $endereco ?></span>
    <span class="info"><b>Número:</b> <?php echo $numero ?></span>
    <span class="info"><b>Bairro:</b> <?php echo $bairro ?></span></p>
    <p><span class="info"><b>Cidade:</b> <?php echo $cidade ?></span>
    <span class="info"><b>Estado:</b> <?php echo $estado ?></span>
    <span class="info"><b>CEP:</b> <?php echo $cep ?></span></p>
</div>

<div class="section">
    <div class="section-title">Informações dos Pais/Responsável</div>
    <p><span class="info"><b>Nome do Responsável:</b> <?php echo $nome_responsavel ?></span></p>
    <p><span class="info"><b>Nome da Mãe:</b> <?php echo $nome_mae ?></span>
    <span class="info"><b>Ocupação da Mãe:</b> <?php echo $ocupacao_mae ?></span></p>
    <p><span class="info"><b>Nome do Pai:</b> <?php echo $nome_pai ?></span>
    <span class="info"><b>Ocupação do Pai:</b> <?php echo $ocupacao_pai ?></span></p>
    <p><span class="info"><b>Queixa:</b> <?php echo $queixa ?></span></p>
</div>

<div class="section">
    <div class="section-title">Escolaridade</div>
    <p><span class="info"><b>Escolaridade Pai:</b> <?php echo $escolaridade_pai ?></span>
    <span class="info"><b>Escolaridade Mãe:</b> <?php echo $escolaridade_mae ?></span></p>
    <p><span class="info"><b>Turno:</b> <?php echo $turno ?></span>
    <span class="info"><b>Série:</b> <?php echo $serie ?></span>
    <span class="info"><b>Tipo Escola:</b> <?php echo $tipo_escola ?></span></p>
    <p><span class="info"><b>Nome Escola:</b> <?php echo $nome_escola ?></span></p>
</div>

<div class="section">
    <div class="section-title">Anamnese</div>
    <?php if ($anamneses): ?>
        <?php foreach ($anamneses as $ana): ?>
            <p><b><?php echo $ana['grupo'] ?>:</b> <?php echo $ana['descricao'] ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma Anamnese Lançada</p>
    <?php endif; ?>
</div>

<div class="section">
    <div class="section-title">Histórico Clínico</div>
    <?php if ($historicos): ?>
        <?php foreach ($historicos as $historico): ?>
            <p><span class="info"><b>Data:</b> <?php echo date('d/m/Y', strtotime($historico['data'])) ?></span>
            <b>Descrição:</b> <?php echo $historico['descricao'] ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Sem histórico clínico registrado.</p>
    <?php endif; ?>
</div>

</body>
</html>
