<?php

$pag = 'prontuario/identificacao';
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

<!-- DADOS DO PACIENTE IDENTIFICAÇÃO -->
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

		<a href="#" data-toggle="modal" data-target="#editarIdentificacao222" title="Editar Dados" ">
				<i class="btn btn-primary">Editar Identificação</i> </a>

	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="editarIdentificacao222" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editModalLabel">Editar Dados do Paciente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="POST" enctype="multipart/form-data" id="formEditarpaciente">
                    <div class="modal-body">
                        <div class="row mt-3">
                            <p><b>Prontuário Número:</b> <span id="prontuario_numero"><?php echo $id; ?></span></p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Paciente" value="<?php echo htmlspecialchars($nome); ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Cartão Nacional de Saúde (CNS)</label>
                                <input type="text" class="form-control" id="cartaosus" name="cns" placeholder="Cartão Nacional de Saúde" value="<?php echo htmlspecialchars($cns); ?>">
                            </div>
                            <div class="col-md-4">
                                <label>CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Seu CPF" value="<?php echo htmlspecialchars($cpf); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email do Paciente" value="<?php echo htmlspecialchars($email); ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Seu Telefone" value="<?php echo htmlspecialchars($telefone); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Seu Celular" value="<?php echo htmlspecialchars($celular); ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nasc" name="data_nasc" value="<?php echo htmlspecialchars($data_nasc); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Sexo</label>
                                <select class="form-control" id="sexo" name="sexo">
                                    <option value="Masculino" <?php echo ($sexo == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="Feminino" <?php echo ($sexo == 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                                    <option value="Outro" <?php echo ($sexo == 'Outro') ? 'selected' : ''; ?>>Outro</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Raça/Cor</label>
                                <input type="text" class="form-control" id="raca" name="raca" placeholder="Raça/Cor" value="<?php echo htmlspecialchars($raca); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nacionalidade</label>
                                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="Nacionalidade" value="<?php echo htmlspecialchars($nacionalidade); ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Queixa Principal</label>
                                <input type="text" class="form-control" id="queixa" name="queixa" placeholder="Queixa Principal" value="<?php echo htmlspecialchars($queixa); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="<?php echo htmlspecialchars($estado); ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="<?php echo htmlspecialchars($cidade); ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo htmlspecialchars($bairro); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="<?php echo htmlspecialchars($endereco); ?>">
                            </div>
                            <div class="col-md-4">
                                <label>CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="<?php echo htmlspecialchars($cep); ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" value="<?php echo htmlspecialchars($numero); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nome do Responsável</label>
                                <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" placeholder="Nome do Responsável" value="<?php echo htmlspecialchars($nome_responsavel); ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Nome do Pai</label>
                                <input type="text" class="form-control" id="nome_pai" name="nome_pai" placeholder="Nome do Pai" value="<?php echo htmlspecialchars($nome_pai); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ocupação do Pai</label>
                                <input type="text" class="form-control" id="ocupacao_pai" name="ocupacao_pai" placeholder="Ocupação do Pai" value="<?php echo htmlspecialchars($ocupacao_pai); ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Nome da Mãe</label>
                                <input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="Nome da Mãe" value="<?php echo htmlspecialchars($nome_mae); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ocupação da Mãe</label>
                                <input type="text" class="form-control" id="ocupacao_mae" name="ocupacao_mae" placeholder="Ocupação da Mãe" value="<?php echo htmlspecialchars($ocupacao_mae); ?>">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	var pag = "<?= $pag ?>";
</script>