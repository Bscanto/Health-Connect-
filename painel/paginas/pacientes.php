<?php
$pag = 'pacientes';

if (@$pacientes == 'ocultar') {
	echo "<script>window.location='../index.php'</script>";
	exit();
}

?>
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

<div class="bs-example widget-shadow" style="padding:15px" id="listar">

</div>

<input type="hidden" id="ids">

<!-- MODAL PACIENTES -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

					<div class="row">
						<div class="col-md-4">
							<label>Nome</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Paciente" required>
						</div>
						<div class="col-md-4">
							<label>Cartão Nacional de Saúde (CNS)</label>
							<input type="text" class="form-control" id="cns" name="cns" placeholder="CNS" minlength="18" maxlength="18" required>
						</div>

						<div class="col-md-4">
							<label>cpf</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Seu CPF" required>
						</div>

					</div>


					<div class="row">

						<div class="col-md-6">
							<label>Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email do Paciente" required>
						</div>

						<div class="col-md-3">
							<label>Data de Nascimento</label>
							<input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
						</div>

						<div class="col-md-3">
							<label>Sexo</label>
							<select class="form-control" name="sexo" id="sexo">
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
								<option value="o">Outro</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<label>Endereço</label>
							<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" required>
						</div>

						<div class="col-md-4">
							<label>Número</label>
							<input type="number" class="form-control" id="numero" name="numero" placeholder="Número" required>
						</div>

						<div class="col-md-4">
							<label>CEP</label>
							<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
						</div>

					</div>

					<div class="row">

						<div class="col-md-4">
							<label>Bairro</label>
							<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
						</div>

						<div class="col-md-4">
							<label>Cidade</label>
							<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
						</div>

						<div class="col-md-4">
							<label>Estado</label>
							<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label>Nome do Responsável</label>
							<input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" placeholder="Nome do Responsável">
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
							<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone Principal">
						</div>

						<div class="col-md-4">
							<label>Celular</label>
							<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
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
							<input type="date" class="form-control" id="data_cad" name="data_cad">
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
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">
                    <span id="titulo_dados"></span>
                </h4>
                <button id="btn-fechar-dados" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4><b>Informações Pessoais</b></h4>
                        <p><b>Nome:</b> <span id="nome_dados"></span></p>
                        <p><b>CPF:</b> <span id="cpf_dados"></span></p>
                        <p><b>Telefone:</b> <span id="telefone_dados"></span></p>
                        <p><b>Email:</b> <span id="email_dados"></span></p>
                        <p><b>Data de Nascimento:</b> <span id="data_nasc_dados"></span></p>
                        <p><b>Sexo:</b> <span id="sexo_dados"></span></p>
                        <p><b>Raça/Cor:</b> <span id="raca_dados"></span></p>
                        <p><b>Nacionalidade:</b> <span id="nacionalidade_dados"></span></p>
                    </div>

                    <div class="col-md-6">
                        <h4><b>Endereço</b></h4>
                        <p><b>Estado:</b> <span id="estado_dados"></span></p>
                        <p><b>Cidade:</b> <span id="cidade_dados"></span></p>
                        <p><b>Bairro:</b> <span id="bairro_dados"></span></p>
                        <p><b>Endereço:</b> <span id="endereco_dados"></span></p>
                        <p><b>Cep:</b> <span id="cep_dados"></span></p>
                        <p><b>Número:</b> <span id="numero_dados"></span></p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h4><b>Informações do Responsável</b></h4>
                        <p><b>Nome do Responsável:</b> <span id="nome_responsavel_dados"></span></p>
                        <p><b>Nome do Pai:</b> <span id="nome_pai_dados"></span></p>
                        <p><b>Ocupação do Pai:</b> <span id="ocupacao_pai_dados"></span></p>
                        <p><b>Nome da Mãe:</b> <span id="nome_mae_dados"></span></p>
                        <p><b>Ocupação da Mãe:</b> <span id="ocupacao_mae_dados"></span></p>
                    </div>

                    <div class="col-md-6">
                        <h4><b>Informações Adicionais</b></h4>
                        <p><b>Celular:</b> <span id="celular_dados"></span></p>
                        <p><b>Ativo:</b> <span id="ativo_dados"></span></p>
                        <p><b>Queixa Principal:</b> <span id="queixa_dados"></span></p>
                        <p><b>Data de Cadastro:</b> <span id="data_cad_dados"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>
<script src="js/ajax.js"></script>