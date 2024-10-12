<?php
session_start();


$pag = 'consultas';

if (@$pacientes == 'ocultar') {
	echo "<script>window.location='../index.php'</script>";
	exit();
}

?>
<h1>Consultas</h1>
<br>
<a onclick="inserir()" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Paciente</a>

<li class="dropdown head-dpdn2" style="display: inline-block;">
	<a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle" id="btn-deletar" style="display:none"><span class="fa fa-trash-o"></span> Deletar</a>

	<ul class="dropdown-menu">
		<li>
			<div class="notification_desc2">
				<p>Exclulir selecionados? <a href="#" onclick="deletarSel()"><span class="text-danger">Sim</span></a></p>
			</div>
		</li>
	</ul>
</li>

<div class="bs-example widget-shadow" style="padding:15px" id="listarConsulta">

</div>

<input type="hidden" id="ids">

<!-- MODAL PACIENTES -->
<div class="modal fade" id="modalForm">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="titulo_inserir"></span></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form">
				<div class="modal-body">

					<div class="row mt-3">
						<p><b>Prontuário Número:</b> <span id="prontuario_numero"></span></p>
					</div>

					<div class="row">
						<div class="col-md-4">
							<label>Nome</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Paciente" required>
						</div>

						<div class="col-md-4">
							<label>Cartão Nacional de Saúde (CNS)</label>
							<input type="text" class="form-control" id="cns" name="cns" placeholder="Cartão Nacional de Saúde" required>
						</div>

						<div class="col-md-4">
							<label>cpf</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Seu CPF" required>
						</div>

					</div>


					<div class="row">

						<div class="col-md-6">
							<label>Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email do Paciente">
						</div>

						<div class="col-md-3">
							<label>Data de Nascimento</label>
							<input type="date" class="form-control" id="data_nasc" name="data_nasc">
						</div>

						<div class="col-md-3">
							<label>Sexo</label>
							<select class="form-control" name="sexo" id="sexo">
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
								<option value="O">Outro</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<label>Endereço</label>
							<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
						</div>

						<div class="col-md-4">
							<label>Número</label>
							<input type="number" class="form-control" id="numero" name="numero" placeholder="Número">
						</div>

						<div class="col-md-4">
							<label>CEP</label>
							<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
						</div>

					</div>

					<div class="row">

						<div class="col-md-4">
							<label>Bairro</label>
							<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
						</div>

						<div class="col-md-4">
							<label>Cidade</label>
							<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
						</div>

						<div class="col-md-4">
							<label>Estado</label>
							<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label>Nome do Responsável</label>
							<input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" placeholder="Nome do Responsável" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label>Nome da Mãe</label>
							<input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="Nome da Mãe">
						</div>

						<div class="col-md-6">
							<label>Ocupação da Mãe</label>
							<input type="text" class="form-control" id="ocupacao_mae" name="ocupacao_mae" placeholder="Ocupação da Mãe">
						</div>



						<div class="col-md-6">
							<label>Nome do Pai</label>
							<input type="text" class="form-control" id="nome_pai" name="nome_pai" placeholder="Nome do Pai">
						</div>

						<div class="row">
							<div class="col-md-6">
								<label>Ocupação do Pai</label>
								<input type="text" class="form-control" id="ocupacao_pai" name="ocupacao_pai" placeholder="Ocupação do Pai">
							</div>
						</div>




					</div>

					<div class="row">
						<div class="col-md-4">
							<label>Telefone</label>
							<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone Principal" required>
						</div>

						<div class="col-md-4">
							<label>Celular</label>
							<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" required>
						</div>

						<div class="col-md-4">
							<label>Raça</label>
							<input type="text" class="form-control" id="raca" name="raca" placeholder="Raça">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label>Nacionalidade</label>
							<input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="Nacionalidade">
						</div>
						<div class="col-md-6">
							<label>Data de Cadastro</label>
							<input type="date" class="form-control" id="data_cad" name="data_cad" required>
						</div>

					</div>


					<div class="row">
						<div class="col-md-12">
							<label>Queixa</label>
							<textarea class="form-control" name="queixa" id="queixa"></textarea>
						</div>
					</div>

					<input type="hidden" class="form-control" id="id" name="id">
					<br>
					<small>
						<div id="mensagem" align="center"></div>
					</small>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal Dados -->
<div class="modal fade" id="modalDados">
	<div class="modal-dialog modal-lg" role="document" style="width:100%">
		<div class="modal-content">

			<!-- Modal header -->
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="nome_dados"></span> <span style="margin-left: 25px; font-size: 15px"><a title="PDF da Ficha Paciente" href="" onclick="ficha()"><i class="fa fa-file-pdf-o text-danger"></i> Imprimir Ficha</a></span></h4>
				<button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="row mt-3">
					<p><b>Data de Cadastro:</b> <span id="data_cad_dados"></span></p>
				</div>
			</div>




			<div class="modal-body">

				<div class="row">

					<!-- DIV PESSOAIS/RESPONSAVEIS -->
					<div class="col-md-6" style="font-size:14px">

						<div style="margin-bottom: 5px; border-bottom:1px solid #cecece; padding-bottom:3px">
							<h4><b class="text-danger">Informações Pessoais</b></h4>
							<br>
							<span style="margin-right: 20px"><b>Cns</b> <span id="cns_dados"></span></span>
							<span style="margin-right: 20px"><b>Email</b> <span id="email_dados"></span></span>
							<span style="margin-right: 20px"><b>CPF</b> <span id="cpf_dados"></span></span>
							<br>
							<span style="margin-right: 20px"><b>Telefone</b> <span id="telefone_dados"></span></span>
							<span style="margin-right: 20px"><b>Celular</b> <span id="celular_dados"></span></span>
							<span style="margin-right: 20px"><b>Data Nacimentoe</b> <span id="data_nasc_dados"></span></span>
							<br>
							<span style="margin-right: 20px"><b>sexo</b> <span id="sexo_dados"></span></span>
							<span style="margin-right: 20px"><b>Raça/Cor</b> <span id="raca_dados"></span></span>
							<span style="margin-right: 20px"><b>Nacionalidade</b> <span id="nacionalidade_dados"></span></span>
							<br>
						</div>



						<div style="margin-bottom: 5px; border-bottom:1px solid #cecece; padding-bottom:3px">
							<h4><b class="text-danger">Informações Pais/Responsável</b></h4>
							<br>
							<span style="margin-right: 20px"><b>Nome do Responsável:</b> <span id="nome_responsavel_dados"></span></span>
							<br>
							<span style="margin-right: 20px"><b>Nome da Mãe:</b> <span id="nome_mae_dados"></span></span>
							<span style="margin-right: 20px"><b>Ocupação da Mãe:</b> <span id="ocupacao_mae_dados"></span></span>
							<br>
							<span style="margin-right: 20px"><b>Nome do Pai:</b> <span id="nome_pai_dados"></span></span>
							<span style="margin-right: 20px"><b>Ocupação do Pai:</b> <span id="ocupacao_pai_dados"></span></span>
							<br>
							<span style="margin-right: 20px"><b>Queixa:</b> <span id="queixa_dados"></span></span>
						</div>
					</div>



					<!-- DIV ENDERECO/ESCOLARIDADE -->
					<div class="col-md-6" style="font-size:14px">

						<div style="margin-bottom: 5px; border-bottom:1px solid #cecece; padding-bottom:3px">
							<h4><b class="text-danger">Endereço</b></h4>
							<br>
							<span style="margin-right: 20px"><b>Endereço</b> <span id="endereco_dados"></span></span>
							<span style="margin-right: 20px"><b>Número</b> <span id="numero_dados"></span></span>
							<span style="margin-right: 20px"><b>Bairro</b> <span id="bairro_dados"></span></span>
							<br>
							<span style="margin-right: 20px"><b>Cidade</b> <span id="cidade_dados"></span></span>
							<span style="margin-right: 20px"><b>Estado</b> <span id="estado_dados"></span></span>
							<span style="margin-right: 20px"><b>Cep</b> <span id="cep_dados"></span></span>
							<br>
							<br>
						</div>

						<div style="margin-bottom: 5px; border-bottom:1px solid #cecece; padding-bottom:3px;">
							<h4><b class="text-danger">Escolaridade</b></h4>
							<br>
							<span style="margin-right: 20px"><b>Escolaridade Pai: </b> <span id="escolaridade_pai_dados"></span></span>
							<span style="margin-right: 20px"><b>Escolaridade Mãe: </b> <span id="escolaridade_mae_dados"></span></span>
							<br>
							<span style="margin-right: 20px"><b>Turno: </b> <span value="<?= $turno ?>"></span></span>
							<span style="margin-right: 20px"><b>Serie: </b> <span id="serie_dados"></span></span>
							<span style="margin-right: 20px"><b>Tipo Escola: </b> <span id="tipo_escola"></span></span>
							<br>
							<span style="margin-right: 20px"><b>Nome Escola: </b> <span id="nome_escola_dados"></span></span>
							<br>
							<br>
						</div>

					</div>

					<hr>
				</div>
			</div>


			<div class="modal-body">
				<div class="row">
					<!-- DIV HISTóRICO -->
					<div class="col-md-6" style="border-left: 1px solid #242323; font-size:14px">
						<br>
						<b>Histório Clínico</b>

						<div id="historico_div" style="overflow: scroll; max-height:300px; scrollbar-width: thin; padding:2px">
							<div class="row">
								<form id="form-historico">
									<div class="col-md-10">
										<textarea maxlength="2000" name="historico" id="historico" class="form-control" required></textarea>
									</div>

									<div class="col-md-2" style="margin-top: 40px">
										<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></button>
									</div>
									<input type="hidden" name="id_pac" id="id_pac">
									<input type="hidden" name="id_con" id="id_con">
								</form>
							</div>
							<small>
								<div id="mensagem-historico"></div>
							</small>
						</div>
					</div>



					<div class="col-md-6" style="border-left: 1px solid #242323; font-size:14px">

						<div style="margin-top: 15px; margin-bottom: 5px; border-bottom: 1px solid #000">
							<b>ANAMNESE</b>
						</div>

						<div id="listar_ana_pac" style="margin-top:5px">
						</div>
					</div>

				</div>
			</div>



		</div>
	</div>
</div>


<!-- MODAL ESCOLARIDADE -->
<!-- Modal para Adicionar/Editar Escolaridade -->
<div class="modal fade" id="modalEscolaridade">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="modalEscolaridadeLabel">Editar Escolaridade</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form id="formEscolaridade">
				<div class="modal-body">
					<input type="hidden" id="paciente_id" name="paciente_id">

					<div class="row">
						<div class="form-group col-md-6">
							<label for="escolaridade_pai">Escolaridade do Pai</label>
							<input type="text" class="form-control" id="escolaridade_pai" name="escolaridade_pai" value="">
						</div>

						<div class="form-group col-md-6">
							<label for="escolaridade_mae">Escolaridade da Mãe</label>
							<input type="text" class="form-control" id="escolaridade_mae" name="escolaridade_mae">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-4">
							<label for="tipo_escola">Tipo de Escola</label>
							<input type="text" class="form-control" id="tipo_escola" name="tipo_escola">
						</div>

						<div class="form-group col-md-4">
    <label for="turno">Turno</label>
    <input type="text" class="form-control" id="turno" name="turno">
</div>


						<div class="form-group col-md-4">
							<label for="serie">Série</label>
							<input type="text" class="form-control" id="serie" name="serie">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-8">
							<label>Nome Escola</label>
							<select class="form-control" name="nome_escola" id="nome_escola" required>
								<?php
								$query = $pdo->query("SELECT * from escola order by id asc");
								$res = $query->fetchAll(PDO::FETCH_ASSOC);
								$linhas = @count($res);
								if ($linhas > 0) {
									for ($i = 0; $i < $linhas; $i++) {
								?>
										<!-- Aqui estamos ajustando o value para enviar o ID da escola -->
										<option value="<?php echo $res[$i]['id'] ?>"><?php echo $res[$i]['nome_escola'] ?></option>

									<?php }
								} else { ?>
									<option value="">Cadastre uma escola</option>
								<?php } ?>
							</select>

						</div>
					</div>

					<div class="row"></div>
					<div class="form-group col-md-6">
						<label for="data_escolaridade">Data da Escolaridade</label>
						<input type="date" class="form-control" id="data_escolaridade" name="data_escolaridade">
					</div>



					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Salvar</button>
					</div>
				</div>

			</form>

		</div>
	</div>
</div>



<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>