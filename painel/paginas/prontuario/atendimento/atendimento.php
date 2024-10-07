<?php

$pag = 'atendimento';

require_once("../../../../conexao.php");

if (isset($_GET['id'])) {
	$id_paciente = $_GET['id']; // Corrigido para definir $id_paciente

	$query = $pdo->prepare("SELECT 
    id_atendimento,
    data_conclusao,
    conclusao,
    continua_atencao_basica,
    continua_capsi,
    diagnostico_secundario,
    cid_secundario,
    diagnostico_principal,
    cid_principal,
    origem_paciente,
    tipo_substancia,
    usuario_substancia,
    fk_paciente_id
FROM 
    dados_atendimento
WHERE 
    fk_paciente_id = :id_paciente");

	$query->bindParam(':id_paciente', $id_paciente, PDO::PARAM_INT);
	$query->execute();

	$dadosAtendimento = $query->fetch(PDO::FETCH_ASSOC);

	// Verifique se os dados foram encontrados
	if ($dadosAtendimento) {
		// Dados do atendimento
		$id_atendimento = $dadosAtendimento['id_atendimento'];
		$data_conclusao = $dadosAtendimento['data_conclusao'];
		$conclusao = $dadosAtendimento['conclusao'];
		$continua_atencao_basica = $dadosAtendimento['continua_atencao_basica'];
		$continua_capsi = $dadosAtendimento['continua_capsi'];
		$diagnostico_secundario = $dadosAtendimento['diagnostico_secundario'];
		$cid_secundario = $dadosAtendimento['cid_secundario'];
		$diagnostico_principal = $dadosAtendimento['diagnostico_principal'];
		$cid_principal = $dadosAtendimento['cid_principal'];
		$origem_paciente = $dadosAtendimento['origem_paciente'];
		$tipo_substancia = $dadosAtendimento['tipo_substancia'];
		$usuario_substancia = $dadosAtendimento['usuario_substancia'];
		$fk_paciente_id = $dadosAtendimento['fk_paciente_id'];
	} else {
		echo "Paciente sem Atendimento Cadastrada!";
		echo '';
		// Botão para cadastrar novo atendimento
		echo <<<HTML
<br>
<a href="#" data-toggle="modal" data-target="#editAtendimentoModal" title="Adicionar Atendimento">
    <button class="btn btn-primary">Adicionar Atendimento</button>
</a>
HTML;
		
		exit;
	}
} else {
	echo "ID do paciente não fornecido.";
	exit;
}
?>

<!-- MOSTRA OS DADOS NA TELA -->
 
<div class="container">
	<h3>Dados do Atendimento</h3>

	<div class="modal-body">
		<div class="row mt-3">
			<p><b>Prontuário Número:</b> <span><?php echo htmlspecialchars($fk_paciente_id); ?></span></p>
		</div>

		<div class="row">
			<div class="col-md-4">
				<h4><b>Informações do Atendimento</b></h4>
				<br>

				<p><b>Origem do Paciente:</b> <span><?php echo htmlspecialchars($origem_paciente); ?></span></p>
				<p><b>Usuário de Substância:</b> <span><?php echo htmlspecialchars($usuario_substancia); ?></span></p>
				<p><b>Tipo de Substância:</b> <span><?php echo htmlspecialchars($tipo_substancia); ?></span></p>

				<br>

				<p><b>CID Principal:</b> <span><?php echo htmlspecialchars($cid_principal); ?></span></p>
				<p><b>Diagnóstico Principal:</b> <span><?php echo htmlspecialchars($diagnostico_principal); ?></span></p>
				<p><b>CID Secundário:</b> <span><?php echo htmlspecialchars($cid_secundario); ?></span></p>
				<p><b>Diagnóstico Secundário:</b> <span><?php echo htmlspecialchars($diagnostico_secundario); ?></span></p>
				<br>

				<p><b>Continua Atenção Básica:</b> <span><?php echo htmlspecialchars($continua_atencao_basica); ?></span></p>
				<p><b>Continua CAPSi:</b> <span><?php echo htmlspecialchars($continua_capsi); ?></span></p>


				<p><b>Conclusão:</b> <span><?php echo htmlspecialchars($conclusao); ?></span></p>
				<p><b>Data de Conclusão:</b> <span><?php echo htmlspecialchars($data_conclusao); ?></span></p>

				<br>

				<a href="#" data-toggle="modal" data-target="#editAtendimentoModal" title="Editar Dados" onclick="editarAtendimento()">
					<i class="btn btn-primary">Editar Atendimento</i></a>

			</div>


		</div>
	</div>
</div>



<!-- Modal para Editar Atendimento -->
<div class="modal fade" id="editAtendimentoModal" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="editAtendimentoModalLabel">Editar Atendimento</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form id="formEditAtendimento" method="POST" action="/salvar_atendimento.php">
					<input type="hidden" name="id_atendimento" value="<?php echo htmlspecialchars($id_atendimento); ?>">


					<div class="form-group">
					<input type="hidden" name="id_atendimento" value="<?php echo htmlspecialchars($id_atendimento); ?>">

						<label for="cid_principal">CID Principal e Diagnóstico Principal</label>
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" id="cid_principal" name="cid_principal" value="<?php echo htmlspecialchars($cid_principal); ?>" placeholder="CID Principal">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="diagnostico_principal" name="diagnostico_principal" value="<?php echo htmlspecialchars($diagnostico_principal); ?>" placeholder="Diagnóstico Principal">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="cid_secundario">CID Secundário e Diagnóstico Secundário</label>
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" id="cid_secundario" name="cid_secundario" value="<?php echo htmlspecialchars($cid_secundario); ?>" placeholder="CID Secundário">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="diagnostico_secundario" name="diagnostico_secundario" value="<?php echo htmlspecialchars($diagnostico_secundario); ?>" placeholder="Diagnóstico Secundário">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="usuario_substancia">Usuário de Substância</label><br>
						<select class="form-control" id="usuario_substancia" name="usuario_substancia" onchange="toggleTipoSubstancia(this.value)">
							<option value="Não" <?php echo ($usuario_substancia == 'Não') ; ?>>Não</option>
							<option value="Sim" <?php echo ($usuario_substancia == 'Sim') ; ?>>Sim</option>
						</select>
					</div>

					<div class="form-group">
						<label for="tipo_substancia">Tipo de Substância</label>
						<select class="form-control" id="tipo_substancia" name="tipo_substancia">
						<option value="Nenhuma" <?php echo ($tipo_substancia == 'Álcool') ; ?>>Nenhuma</option>
							<option value="Álcool" <?php echo ($tipo_substancia == 'Álcool') ; ?>>Álcool</option>
							<option value="Maconha" <?php echo ($tipo_substancia == 'Maconha') ; ?>>Maconha</option>
							<option value="Crack" <?php echo ($tipo_substancia == 'Crack') ; ?>>Crack</option>
							<option value="Outras Drogas" <?php echo ($tipo_substancia == 'Outras Drogas') ; ?>>Outras Drogas</option>
						</select>
					</div>
					<div class="form-group">
						<label for="continua_atencao_basica">Continua na Atenção Básica</label><br>
						<select class="form-control" id="continua_atencao_basica" name="continua_atencao_basica">
							<option value="Não" <?php echo ($continua_atencao_basica == 'Não') ? 'selected' : ''; ?>>Não</option>
							<option value="Sim" <?php echo ($continua_atencao_basica == 'Sim') ? 'selected' : ''; ?>>Sim</option>
						</select>
					</div>

					<div class="form-group">
						<label for="continua_capsi">Continua no CAPSi</label><br>
						<select class="form-control" id="continua_capsi" name="continua_capsi">
							<option value="Não" <?php echo ($continua_capsi == 'Não') ? 'selected' : ''; ?>>Não</option>
							<option value="Sim" <?php echo ($continua_capsi == 'Sim') ? 'selected' : ''; ?>>Sim</option>
						</select>
					</div>

					<div class="form-group">
						<label for="conclusao">Conclusão</label><br>
						<select class="form-control" id="conclusao" name="conclusao">
							<option value="Tratamento" <?php echo ($conclusao == 'Em tratamento') ? 'selected' : ''; ?>>Em Tratamento</option>
							<option value="Alta" <?php echo ($conclusao == 'Alta') ? 'selected' : ''; ?>>Alta</option>
							<option value="Óbito" <?php echo ($conclusao == 'Óbito') ? 'selected' : ''; ?>>Óbito</option>
						</select>
					</div>

					<div class="form-group">
						<label for="origem_paciente">Origem do Paciente</label><br>
						<select class="form-control" id="origem_paciente" name="origem_paciente">
							<option value="Demanda Espontânea" <?php echo ($origem_paciente == 'Demanda Espontânea') ? 'selected' : ''; ?>>Demanda Espontânea</option>
							<option value="Atenção Básica" <?php echo ($origem_paciente == 'Atenção Básica') ? 'selected' : ''; ?>>Atenção Básica</option>
							<option value="Serviço de Urgência" <?php echo ($origem_paciente == 'Serviço de Urgência') ? 'selected' : ''; ?>>Serviço de Urgência</option>
							<option value="CAPSi" <?php echo ($origem_paciente == 'CAPSi') ? 'selected' : ''; ?>>CAPSi</option>
							<option value="Hospital" <?php echo ($origem_paciente == 'Hospital') ? 'selected' : ''; ?>>Hospital</option>
						</select>
					</div>

					<button type="submit" class="btn btn-primary">Salvar Alterações</button>
				</form>
			</div>
		</div>
	</div>
</div>




<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>