<?php

$pag = 'acao';
$tabela = 'paciente';

require_once("../../../../conexao.php");

if (isset($_GET['id'])) {
	$id = $_GET['id']; // Corrigido para definir $id_paciente

	$query = $pdo->prepare("SELECT paciente.id AS paciente_id, paciente.nome, 
    acao_realizada.id_acao_realizada, 
    acao_realizada.quantidade, 
    acao_realizada.servico, 
    acao_realizada.data_acao, 
    acao_realizada.classificacao, 
    acao_realizada.cbo, 
    acao_realizada.cnsp, 
    acao_realizada.local_acao, 
    acao_realizada.descricao_procedimento, 
    acao_realizada.fk_acao_id, 
    acao_realizada.fk_usuarios_id, 
    acao_realizada.fk_paciente_id,
    acao.id AS acao_id, 
    acao.descricao AS descricao_acao
FROM 
    paciente
JOIN 
    acao_realizada ON paciente.id = acao_realizada.fk_paciente_id
JOIN 
    acao ON acao_realizada.fk_acao_id = acao.id
WHERE 
    paciente.id = :id
");

	// Vinculando o ID do paciente à consulta
	$query->bindParam(':id', $id, PDO::PARAM_INT);
	$query->execute();

	$dados = $query->fetch(PDO::FETCH_ASSOC);

	// Verifique se os dados foram encontrados
	if ($dados) {
		// Dados do paciente
		$paciente_id = $dados['paciente_id'];
		$nome = $dados['nome'];

		// Dados da ação realizada
		$id_acao_realizada = $dados['id_acao_realizada'];
		$quantidade = $dados['quantidade'];
		$servico = $dados['servico'];
		$data_acao = $dados['data_acao'];
		$classificacao = $dados['classificacao'];
		$cbo = $dados['cbo'];
		$cnsp = $dados['cnsp'];
		$local_acao = $dados['local_acao'];
		$descricao_procedimento = $dados['descricao_procedimento'];
		$fk_acao_id = $dados['fk_acao_id'];
		$fk_usuarios_id = $dados['fk_usuarios_id'];
		$fk_paciente_id = $dados['fk_paciente_id'];

		$data_acaoF = implode('/', array_reverse(explode('-', $data_acao)));
		// Dados da ação
		$acao_id = $dados['acao_id'];
		$descricao_acao = $dados['descricao_acao'];
	} else {
		echo "Paciente sem ações Cadastrada!";
		// Adicionando o botão para cadastrar escolaridade
		echo '<br><a href="#" data-toggle="modal" data-target="#editModal" title="Adicionar Escolaridade">';
		echo '<i class="btn btn-primary">Adicionar Ação</i></a>';

		exit;
	}
} else {
	echo "ID do paciente não fornecido.";
	exit;
}
?>



<div class="container">

	<h3>Ações Realizadas</h3>

	<div class="modal-body">
		<div class="row mt-3">
			<p><b>Prontuário Número:</b> <span><?php echo htmlspecialchars($id); ?></span></p>
			<p><b>Nome do Paciente:</b> <span><?php echo htmlspecialchars($nome); ?></span></p>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h4><b>Dados da Ação</b></h4>
				<p><b>Descrição da Ação:</b> <span><?php echo htmlspecialchars($descricao_acao);?></span></p>
			
			<br>
			<h4><b>Dados da Ação Realizada</b></h4>
			<br>
			<p><b>Quantidade:</b> <span><?php echo htmlspecialchars($quantidade); ?></span></p>
			<p><b>Data da Ação:</b> <span><?php echo htmlspecialchars($data_acaoF); ?></span></p>
			<p><b>Serviço:</b> <span><?php echo htmlspecialchars($servico); ?></span></p>
			<p><b>Classificação:</b> <span><?php echo htmlspecialchars($classificacao); ?></span></p>
			<p><b>CBO:</b> <span><?php echo htmlspecialchars($cbo); ?></span></p>
			<p><b>CNSP:</b> <span><?php echo htmlspecialchars($cnsp); ?></span></p>
			<p><b>Local da Ação:</b> <span><?php echo htmlspecialchars($local_acao); ?></span></p>
			<br>
			</div>
			<div class="col-md-8">
				<p><b>Descrição do Procedimento:</b> <span><?php echo htmlspecialchars($descricao_procedimento); ?></span></p>
				<br>
			
			</div>
			
		

		<div class="row mt-3">
			<div class="col-md-12">
				<a href="#" data-toggle="modal" data-target="#editModal" title="Editar Dados" onclick="editar()">
					<i class="btn btn-primary">Editar Ação Realizada</i>
				</a>
			</div>
		</div>
	</div>




</div>



<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>