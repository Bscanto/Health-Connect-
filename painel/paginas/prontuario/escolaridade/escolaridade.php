<?php
$pag = 'escolaridade';
$tabela = 'paciente';

require_once("../../../../conexao.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];


	// Modifique a consulta SQL para buscar apenas o paciente com o ID fornecido
	$query = $pdo->prepare("SELECT paciente.id AS paciente_id, paciente.nome, 
	escolaridade.escolaridade_pai,
			escolaridade.escolaridade_mae,
			escolaridade.tipo_escola,
			escolaridade.turno,
			escolaridade.serie,
			escolaridade.data_escol,
			escola.nome_escola
		FROM 
			paciente
		JOIN 
			escolaridade ON paciente.id = escolaridade.fk_paciente_id
		JOIN 
			escola ON escolaridade.fk_escola_id = escola.id
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
		$id_paciente = $dados['paciente_id'];  // Alterado de 'id' para 'paciente_id'
		$nome = $dados['nome'];

		// Dados de escolaridade
		$escolaridade_pai = $dados['escolaridade_pai'];
		$escolaridade_mae = $dados['escolaridade_mae'];
		$tipo_escola = $dados['tipo_escola'];
		$turno = $dados['turno'];
		$serie = $dados['serie'];
		$data_escol = $dados['data_escol'];

		// Dados da escola
		$nome_escola = $dados['nome_escola'];

	} else {
		echo "Paciente não encontrado.";
		exit; 
	}
} else {
	echo "ID do paciente não fornecido.";
	exit;
}
?>

<div class="container">
	<h1>Escolaridade</h1>

	<div class="modal-body">
		<div class="row mt-3">
			<p><b>Prontuário Número:</b> <span><?php echo htmlspecialchars($id_paciente); ?></span></p>
		</div>

		<div class="row">
			<div class="col-md-4">
				<h4><b>Dados Escolares</b></h4>
				<p><b>Nome da Escola:</b> <span><?php echo htmlspecialchars($nome_escola); ?></span></p>
				<p><b>Série:</b> <span><?php echo htmlspecialchars($serie); ?></span></p>
				<p><b>Turno:</b> <span><?php echo htmlspecialchars($turno); ?></span></p>
				<p><b>Tipo Escola:</b> <span><?php echo htmlspecialchars($tipo_escola); ?></span></p>
				<p><b>Escolaridade da Mãe:</b> <span><?php echo htmlspecialchars($escolaridade_mae); ?></span></p>
				<p><b>Escolaridade do Pai:</b> <span><?php echo htmlspecialchars($escolaridade_pai); ?></span></p>
			</div>

			<div class="row mt-3">
				<p><b>Data da escolaridade:</b> <span><?php echo htmlspecialchars($data_escol); ?></span></p>
			</div>

			<a href="#" data-toggle="modal" data-target="#editModal" title="Editar Dados" onclick="editar()">
				<i class="btn btn-primary">Editar</i>
			</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>
