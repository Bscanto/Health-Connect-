<?php 
$pag = 'acao';
?>
<a onclick="inserirAcao()" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Nova Ação</a>


<div class="bs-example widget-shadow" style="padding:15px" id="listarAcao">

</div>

<input type="hidden" id="ids">

 <!-- Modal Adicionar AÇÕES-->
 <div class="modal fade" id="modalAcao">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="actionModalLabel">Detalhes da Ação</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-2">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" value="">
              </div>
              <div class="mb-3">
                <label for="dataAcao" class="form-label">Data da Ação</label>
                <input type="date" class="form-control" id="dataAcao" value="">
              </div>
              <div class="mb-3">
                <label for="servico" class="form-label">Serviço</label>
                <input type="number" class="form-control" id="servico" value="">
              </div>
              <div class="mb-3">
                <label for="classificacao" class="form-label">Classificação</label>
                <input type="number" class="form-control" id="classificacao" value="">
              </div>
              <div class="mb-3">
                <label for="cbo" class="form-label">CBO</label>
                <input type="text" class="form-control" id="cbo" value="">
              </div>
              <div class="mb-3">
                <label for="cnsp" class="form-label">CNSP</label>
                <input type="text" class="form-control" id="cnsp" value="">
              </div>
              <div class="mb-3">
                <label for="localAcao" class="form-label">Local da Ação</label>
                <input type="text" class="form-control" id="localAcao" value="">
              </div>
              <div class="mb-3">
                <label for="descricaoProcedimento" class="form-label">Descrição do Procedimento</label>
                <textarea class="form-control" id="descricaoProcedimento" rows="4"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Salvar alterações</button>
          </div>
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

			
			<div class="row mt-3">
						<p><b>Prontuário Número:</b> <span id="prontuario_numero"></span></p>
					</div>
		
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
					</div>
				</div>

				<div class="row mt-3">
					<p><b>Data de Cadastro:</b> <span id="data_cad_dados"></span></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	
</script>





<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>


