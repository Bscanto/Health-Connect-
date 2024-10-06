<?php

$pag = 'identificação';
$tabela = 'paciente';

require_once("../../../../conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Modifique a consulta SQL para buscar apenas o paciente com o ID fornecido
    $query = $pdo->prepare("SELECT * FROM $tabela WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    
    // Use fetch para pegar apenas um registro
    $paciente = $query->fetch(PDO::FETCH_ASSOC);

    // Verifique se o paciente foi encontrado
    if ($paciente) {
        $nome = $paciente['nome'];
        $cpf = $paciente['cpf'];
        $telefone = $paciente['telefone'];
        $email = $paciente['email'];
        $ativo = $paciente['ativo'];
        $estado = $paciente['estado'];
        $cidade = $paciente['cidade'];
        $bairro = $paciente['bairro'];
        $endereco = $paciente['endereco'];
        $cep = $paciente['cep'];
        $numero = $paciente['numero'];
        $data_nasc = $paciente['data_nasc'];
        $sexo = $paciente['sexo'];
        $cns = $paciente['cns'];
        $nome_responsavel = $paciente['nome_responsavel'];
        $nome_pai = $paciente['nome_pai'];
        $ocupacao_pai = $paciente['ocupacao_pai'];
        $nome_mae = $paciente['nome_mae'];
        $ocupacao_mae = $paciente['ocupacao_mae'];
        $celular = $paciente['celular'];
        $raca = $paciente['raca'];
        $nacionalidade = $paciente['nacionalidade'];
        $queixa = $paciente['queixa'];
        $data_cad = $paciente['data_cad'];
    } else {
        echo "Paciente não encontrado.";
        exit; // Saia do script se o paciente não for encontrado
    }
} else {
    echo "ID do paciente não fornecido.";
    exit; // Saia do script se o ID não estiver presente
}
?>

<div class="container">
    <h3>Identificação do Paciente</h3>

    <div class="modal-body">
        <div class="row mt-3">
            <p><b>Prontuário Número:</b> <span><?php echo htmlspecialchars($id); ?></span></p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4><b>Informações Pessoais</b></h4>
                <p><b>Nome:</b> <span><?php echo htmlspecialchars($nome); ?></span></p>
                <p><b>CNS:</b> <span><?php echo htmlspecialchars($cns); ?></span></p>
                <p><b>CPF:</b> <span><?php echo htmlspecialchars($cpf); ?></span></p>
                <p><b>Telefone:</b> <span><?php echo htmlspecialchars($telefone); ?></span></p>
                <p><b>Email:</b> <span><?php echo htmlspecialchars($email); ?></span></p>
                <p><b>Data de Nascimento:</b> <span><?php echo htmlspecialchars($data_nasc); ?></span></p>
                <p><b>Sexo:</b> <span><?php echo htmlspecialchars($sexo); ?></span></p>
                <p><b>Raça/Cor:</b> <span><?php echo htmlspecialchars($raca); ?></span></p>
                <p><b>Nacionalidade:</b> <span><?php echo htmlspecialchars($nacionalidade); ?></span></p>
            </div>

            <div class="col-md-4">
                <h4><b>Endereço</b></h4>
                <p><b>Estado:</b> <span><?php echo htmlspecialchars($estado); ?></span></p>
                <p><b>Cidade:</b> <span><?php echo htmlspecialchars($cidade); ?></span></p>
                <p><b>Bairro:</b> <span><?php echo htmlspecialchars($bairro); ?></span></p>
                <p><b>Endereço:</b> <span><?php echo htmlspecialchars($endereco); ?></span></p>
                <p><b>CEP:</b> <span><?php echo htmlspecialchars($cep); ?></span></p>
                <p><b>Número:</b> <span><?php echo htmlspecialchars($numero); ?></span></p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <h4><b>Informações do Responsável</b></h4>
                <p><b>Nome do Responsável:</b> <span><?php echo htmlspecialchars($nome_responsavel); ?></span></p>
                <p><b>Nome do Pai:</b> <span><?php echo htmlspecialchars($nome_pai); ?></span></p>
                <p><b>Ocupação do Pai:</b> <span><?php echo htmlspecialchars($ocupacao_pai); ?></span></p>
                <p><b>Nome da Mãe:</b> <span><?php echo htmlspecialchars($nome_mae); ?></span></p>
                <p><b>Ocupação da Mãe:</b> <span><?php echo htmlspecialchars($ocupacao_mae); ?></span></p>
            </div>

            <div class="col-md-4">
                <h4><b>Informações Adicionais</b></h4>
                <p><b>Celular:</b> <span><?php echo htmlspecialchars($celular); ?></span></p>
                <p><b>Ativo:</b> <span><?php echo htmlspecialchars($ativo); ?></span></p>
                <p><b>Queixa Principal:</b> <span><?php echo htmlspecialchars($queixa); ?></span></p>
            </div>
        </div>

        <div class="row mt-3">
            <p><b>Data de Cadastro:</b> <span><?php echo htmlspecialchars($data_cad); ?></span></p>
        </div>

        <a href="#" onclick="editar('<?= htmlspecialchars($id) ?>', '<?= htmlspecialchars($nome) ?>', '<?= htmlspecialchars($cpf) ?>', '<?= htmlspecialchars($telefone) ?>', '<?= htmlspecialchars($email) ?>', '<?= htmlspecialchars($estado) ?>', '<?= htmlspecialchars($cidade) ?>', '<?= htmlspecialchars($bairro) ?>', '<?= htmlspecialchars($endereco) ?>', '<?= htmlspecialchars($cep) ?>', '<?= htmlspecialchars($numero) ?>', '<?= htmlspecialchars($data_nasc) ?>', '<?= htmlspecialchars($sexo) ?>', '<?= htmlspecialchars($cns) ?>', '<?= htmlspecialchars($nome_responsavel) ?>', '<?= htmlspecialchars($nome_pai) ?>', '<?= htmlspecialchars($ocupacao_pai) ?>', '<?= htmlspecialchars($nome_mae) ?>', '<?= htmlspecialchars($ocupacao_mae) ?>', '<?= htmlspecialchars($celular) ?>', '<?= htmlspecialchars($raca) ?>', '<?= htmlspecialchars($nacionalidade) ?>', '<?= htmlspecialchars($queixa) ?>', '<?= htmlspecialchars($data_cad) ?>')" title="Editar Dados" class="btn btn-primary">Editar</a>
    </div>
</div>

<script type="text/javascript">
    var pag = "<?= $pag ?>";
</script>
