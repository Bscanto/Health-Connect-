<?php
$pag = 'usuarios';

if (@$usuarios == 'ocultar') {
	echo "<script>window.location='../index.php'</script>";
	exit();
}

?>

<div class="main-page margin-mobile">
	<a onclick="inserir()" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Usuário</a>



	<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle" id="btn-deletar" style="display:none"><span class="fa fa-trash-o"></span> Deletar</a>

		<ul class="dropdown-menu">
			<li>
				<div class="notification_desc2">
					<p>Excluir Selecionados? <a href="#" onclick="deletarSel()"><span class="text-danger">Sim</span></a></p
						</div>
			</li>
		</ul>
	</li>

	<div class="bs-example widget-shadow" style="padding:15px" id="listar">

	</div>

</div>

<input type="hidden" id="ids">

<!-- Modal Perfil -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content modal-lg">
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
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Seu Nome" required>
						</div>

						<div class="col-md-4">
							<label>CPF</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
						</div>

						<div class="col-md-4">
							<label>Telefone</label>
							<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Seu Telefone" required>
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<label>Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Seu Email" required>
						</div>

						<div class="col-md-3">
							<label>Nível</label>
							<select class="form-control" name="nivel" id="nivel" required>
								<?php
								$query = $pdo->query("SELECT * from cargos order by id asc");
								$res = $query->fetchAll(PDO::FETCH_ASSOC);
								$linhas = @count($res);
								if ($linhas > 0) {
									for ($i = 0; $i < $linhas; $i++) {
								?>
										<option value="<?php echo $res[$i]['nome'] ?>"><?php echo $res[$i]['nome'] ?></option>

									<?php }
								} else { ?>
									<option value="">Cadastre um cargo</option>
								<?php } ?>
							</select>
						</div>

						<div class="col-md-3">
							<label>CEP</label>
							<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
						</div>


					</div>

					<div class="row">
						<div class="col-md-6">
							<label>Endereço</label>
							<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Seu Endereço">
						</div>

						<div class="col-md-3">
							<label>Número</label>
							<input type="text" class="form-control" id="numero" name="numero" placeholder="Número" required>
						</div>

						<div class="col-md-3">
							<label>Bairro</label>
							<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
						</div>
					</div>

					<div class="row">
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
						<div class="col-md-4">
							<label>Data de Nascimento</label>
							<input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
						</div>

						<div class="col-md-4">
							<label>Sexo</label>
							<select class="form-control" name="sexo" id="sexo" required>
								<option value="masculino">Masculino</option>
								<option value="feminino">Feminino</option>
								<option value="outro">Outro</option>
							</select>
						</div>

					</div>

					<div class="row">
						<div class="col-md-4">
							<label>CBO</label>
							<input type="text" class="form-control" id="cbo" name="cbo" placeholder="CBO" required>
						</div>

						<div class="col-md-4">
							<label>CNSP</label>
							<input type="text" class="form-control" id="cnsp" name="cnsp" placeholder="CNSP" required>
						</div>
					</div>

					<input type="hidden" class="form-control" id="id" name="id">
					<br>
					<small>
						<div id="mensagem" align="center"></div>
					</small>






					<input type="hidden" class="form-control" id="id" name="id">

					<br>
					<small>
						<div id="mensagem" align="center"></div>
					</small>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Salvar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal Dados -->
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="titulo_dados"></span></h4>
				<button id="btn-fechar-dados" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="row" style="margin-top: 0px">

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Nome: </b></span><span id="nome_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Cpf: </b></span><span id="cpf_dados"></span>
					</div>

					<div class="col-md-12" style="margin-bottom: 5px">
						<span><b>Email: </b></span><span id="email_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Telefone: </b></span><span id="telefone_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Nível: </b></span><span id="nivel_dados"></span>
					</div>

					<div class="col-md-8" style="margin-bottom: 5px">
						<span><b>Endereço: </b></span><span id="endereco_dados"></span>
					</div>

					<div class="col-md-4" style="margin-bottom: 5px">
						<span><b>Número: </b></span><span id="numero_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Cidade: </b></span><span id="cidade_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Estado: </b></span><span id="estado_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Bairro: </b></span><span id="bairro_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Cep: </b></span><span id="cep_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Data Nascimento: </b></span><span id="data_nasc_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Sexo: </b></span><span id="sexo_dados"></span>
					</div>

					<div class="col-md-12" style="margin-bottom: 5px">
						<span><b>CBO: </b></span><span id="cbo_dados"></span>
					</div>

					<div class="col-md-12" style="margin-bottom: 5px">
						<span><b>Cadastro Nacional de Saúde do Profissional: </b></span><span id="cnsp_dados"></span>
					</div>

					<div class="col-md-6" style="margin-bottom: 5px">
						<span><b>Data Cadastro: </b></span><span id="data_dados"></span>
					</div>



					<div class="col-md-12" style="margin-bottom: 5px">
						<div align="center"><img src="" id="foto_dados" width="200px"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>






<!-- Modal Permissoes -->
<div class="modal fade" id="modalPermissoes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="nome_permissoes"></span>

					<span style="position:absolute; right:35px">
						<input class="form-check-input" type="checkbox" id="input-todos" onchange="marcarTodos()">
						<label class="">Marcar Todos</label>
					</span>

				</h4>
				<button id="btn-fechar-permissoes" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="row" id="listar_permissoes">

				</div>

				<br>
				<input type="hidden" name="id" id="id_permissoes">
				<small>
					<div id="mensagem_permissao" align="center" class="mt-3"></div>
				</small>
			</div>

		</div>
	</div>
</div>




<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>
<script src="js/ajax.js"></script>



<script type="text/javascript">
	function listarPermissoes(id) {
		$.ajax({
			url: 'paginas/' + pag + "/listar_permissoes.php",
			method: 'POST',
			data: {
				id
			},
			dataType: "html",

			success: function(result) {
				$("#listar_permissoes").html(result);
				$('#mensagem_permissao').text('');
			}
		});
	}

	function adicionarPermissao(id, usuario) {
		$.ajax({
			url: 'paginas/' + pag + "/add_permissao.php",
			method: 'POST',
			data: {
				id,
				usuario
			},
			dataType: "html",

			success: function(result) {
				listarPermissoes(usuario);
			}
		});
	}


	function marcarTodos() {
		let checkbox = document.getElementById('input-todos');
		var usuario = $('#id_permissoes').val();

		if (checkbox.checked) {
			adicionarPermissoes(usuario);
		} else {
			limparPermissoes(usuario);
		}
	}


	function adicionarPermissoes(id_usuario) {
		42
		$.ajax({
			url: 'paginas/' + pag + "/add_permissoes.php",
			method: 'POST',
			data: {
				id_usuario
			},
			dataType: "html",

			success: function(result) {
				listarPermissoes(id_usuario);
			}
		});
	}


	function limparPermissoes(id_usuario) {

		$.ajax({
			url: 'paginas/' + pag + "/limpar_permissoes.php",
			method: 'POST',
			data: {
				id_usuario
			},
			dataType: "html",

			success: function(result) {
				listarPermissoes(id_usuario);
			}
		});
	}
</script>