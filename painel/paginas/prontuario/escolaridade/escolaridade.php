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
		echo "Paciente sem Escolaridade Cadastrada!";
		// Adicionando o botão para cadastrar escolaridade
		
	echo '<br><a href="#" data-toggle="modal" data-target="#editModal" title="Adicionar Escolaridade">';
	echo '<i class="btn btn-success">Adicionar Escolaridade</i></a>';

		exit; 
	}
} else {
	echo "ID do paciente não fornecido.";
	exit;
}
?>

<!-- EXIBE OS DAOS NA TELA -->
<div class="container">
	<h3>Escolaridade</h3>

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
				<br>
				<p><b>Data último cadastro:</b> <span><?php echo htmlspecialchars($data_escol); ?></span></p>
			</div>

			<div class="row">
				
			</div>

			<a href="#" data-toggle="modal" data-target="#editModal" title="Editar Dados" ">
				<i class="btn btn-primary">Editar escolaridade</i></a>
		</div>
	</div>
</div>


<!-- Modal para Editar/Adicionar Escolaridade -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" " >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Editar Escolaridade</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="formEscolaridade" method="POST" 
					<input type="hidden" name="paciente_id" value="<?php echo $id_paciente; ?>">

					<div class="form-group">
						<label for="nome_escola">Nome da Escola</label>
						<input type="text" class="form-control" id="nome_escola" name="nome_escola" value="<?php echo htmlspecialchars($nome_escola); ?>">
					</div>

					<div class="form-group">
						<label for="serie">Série</label>
						<input type="text" class="form-control" id="serie" name="serie" value="<?php echo htmlspecialchars($serie); ?>">
					</div>

					<div class="form-group">
						<label for="turno">Turno</label>
						<input type="text" class="form-control" id="turno" name="turno" value="<?php echo htmlspecialchars($turno); ?>">
					</div>

					<div class="form-group">
						<label for="tipo_escola">Tipo de Escola</label>
						<input type="text" class="form-control" id="tipo_escola" name="tipo_escola" value="<?php echo htmlspecialchars($tipo_escola); ?>">
					</div>

					<div class="form-group">
						<label for="escolaridade_pai">Escolaridade do Pai</label>
						<input type="text" class="form-control" id="escolaridade_pai" name="escolaridade_pai" value="<?php echo htmlspecialchars($escolaridade_pai); ?>">
					</div>

					<div class="form-group">
						<label for="escolaridade_mae">Escolaridade da Mãe</label>
						<input type="text" class="form-control" id="escolaridade_mae" name="escolaridade_mae" value="<?php echo htmlspecialchars($escolaridade_mae); ?>">
					</div>

					<div class="form-group">
						<label for="data_escol">Data do Cadastro</label>
						<input type="date" class="form-control" id="data_escol" name="data_escol" value="<?php echo htmlspecialchars($data_escol); ?>">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>
