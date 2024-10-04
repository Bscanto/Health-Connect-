<?php 


$tabela = 'paciente';
   // Consulta ao banco de dados para obter os dados do paciente

	 if (isset($_GET['id'])) {
			 $id_paciente = $_GET['id'];
			 
			 // Buscar informações do paciente no banco de dados
			 $query = $pdo->prepare("SELECT * FROM $tabela WHERE id = :id");
			 $query->bindValue(':id', $id_paciente);
			 $query->execute();
	 
			 if ($query->rowCount() > 0) {
					 $dados_paciente = $query->fetch(PDO::FETCH_ASSOC);
					 // Armazene os dados em variáveis
					 $id = $dados_paciente['id'];
					 $nome = $dados_paciente['nome'];
					 $cpf = $dados_paciente['cpf'];
					 $telefone = $dados_paciente['telefone'];
					 $email = $dados_paciente['email'];
					 $data_nasc = $dados_paciente['data_nasc'];
					 $sexo = $dados_paciente['sexo'];
					 $cns = $dados_paciente['cns'];
					 $raca = $dados_paciente['raca'];
					 $nacionalidade = $dados_paciente['nacionalidade'];
					 $estado = $dados_paciente['estado'];
					 $cidade = $dados_paciente['cidade'];
					 $bairro = $dados_paciente['bairro'];
					 $endereco = $dados_paciente['endereco'];
					 $cep = $dados_paciente['cep'];
					 $numero = $dados_paciente['numero'];
					 $nome_responsavel = $dados_paciente['nome_responsavel'];
					 $nome_pai = $dados_paciente['nome_pai'];
					 $ocupacao_pai = $dados_paciente['ocupacao_pai'];
					 $nome_mae = $dados_paciente['nome_mae'];
					 $ocupacao_mae = $dados_paciente['ocupacao_mae'];
					 $celular = $dados_paciente['celular'];
					 $ativo = $dados_paciente['ativo'];
					 $queixa = $dados_paciente['queixa'];
					 $data_cad = $dados_paciente['data_cad'];
			 } else {
					 // Caso o ID não seja encontrado, redirecione ou mostre uma mensagem de erro
					 echo "<script>alert('Paciente não encontrado!'); window.location='pacientes';</script>";
					 exit;
			 }
	 }
	
	 echo <<<HTML
	 <script>
       function editar(data) {
    $('#mensagem').text('');
    $('#titulo_inserir').text('Editar Registro');

    // Preencher os campos do modal
    $('#id').val(data.id);
    $('#nome').val(data.nome);
    $('#cpf').val(data.cpf);
    $('#telefone').val(data.telefone);
    $('#email').val(data.email);
    $('#estado').val(data.estado);
    $('#cidade').val(data.cidade);
    $('#bairro').val(data.bairro);
    $('#endereco').val(data.endereco);
    $('#cep').val(data.cep);
    $('#numero').val(data.numero);
    $('#data_nasc').val(data.data_nasc);
    $('#sexo').val(data.sexo).change();
    $('#cartaosus').val(data.cns);
    $('#nome_responsavel').val(data.nome_responsavel);
    $('#nome_pai').val(data.nome_pai);
    $('#ocupacao_pai').val(data.ocupacao_pai);
    $('#nome_mae').val(data.nome_mae);
    $('#ocupacao_mae').val(data.ocupacao_mae);
    $('#celular').val(data.celular);
    $('#raca').val(data.raca);
    $('#nacionalidade').val(data.nacionalidade);
    $('#queixa').val(data.queixa);
    $('#data_cad').val(data.data_cad);

    // Mostrar o modal
    $('#modalForm').modal('show');
}
        </script>


HTML;
?>

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

					<div class="row mt-3">
						<p><b>Prontuário Número:</b> <span id="id"><?php echo $id; ?></span></p>
						<?php echo $nome?>
					</div>

					<div class="row">
						<div class="col-md-4">
							<label>Nome</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Paciente">
						</div>

						<div class="col-md-4">
							<label>Cartão Nacional de Saúde (CNS)</label>
							<input type="text" class="form-control" id="cartaosus" name="cns" placeholder="Cartão Nacional de Saúde">
						</div>

						<div class="col-md-4">
							<label>cpf</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Seu CPF">
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