<?php

$pag = 'acao';
$tabela = 'paciente';

require_once("../../../../conexao.php");

// Pesquisa no banco baseado no id que vem via get 
if (isset($_GET['id'])) {
  $id = $_GET['id']; // ID do paciente

  // Consulta para pegar os dados do paciente
  $queryPaciente = $pdo->prepare("SELECT * FROM $tabela WHERE id = :id");
  $queryPaciente->bindParam(':id', $id, PDO::PARAM_INT);
  $queryPaciente->execute();
  $paciente = $queryPaciente->fetch(PDO::FETCH_ASSOC);

  // Verifica se o paciente existe
  if ($paciente) {
    // Exibe os dados do paciente
    $nome = $paciente['nome'];
    // Adicione outros campos conforme necessário

    // Consulta para pegar as ações realizadas pelo paciente
    $queryAcoes = $pdo->prepare("SELECT 
    acao_realizada.id_acao_realizada, 
    acao_realizada.quantidade, 
    acao_realizada.servico, 
    acao_realizada.data_acao, 
    acao_realizada.classificacao, 
    acao_realizada.cbo,           -- Adicionado
    acao_realizada.cnsp,          -- Adicionado
    acao_realizada.local_acao,    -- Adicionado
    acao.descricao AS descricao_acao
FROM 
    acao_realizada
JOIN 
    acao ON acao_realizada.fk_acao_id = acao.id
WHERE 
    acao_realizada.fk_paciente_id = :id
ORDER BY 
    acao_realizada.data_acao DESC
        ");
    $queryAcoes->bindParam(':id', $id, PDO::PARAM_INT);
    $queryAcoes->execute();
    $acoes = $queryAcoes->fetchAll(PDO::FETCH_ASSOC);



?>





    <div class="container">

      <?php
      if ($acoes > 0) {

      ?>

        <?php if (count($acoes) > 0) { ?>
          <h3>Ações Realizadas</h3>
          <br>

          <a onclick="inserirAcao()" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Inserir Ação</a>

          <small>
            <table class="table table-hover" id="tabela" >
              <thead>
                <tr>
                  <th>Data da Ação</th>
                  <th>CBO</th>
                  <th>CNSP</th>
                  <th>Local da Ação</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($acoes as $acao) {
                  $data_acao = implode('/', array_reverse(explode('-', $acao['data_acao'])));
                  $cbo = $acao['cbo'];
                  $cnsp = $acao['cnsp'];
                  $local_acao = $acao['local_acao'];
                ?>

                  <tr>
                    <td><?php echo $data_acao ?></td>
                    <td><?php echo $cbo ?></td>
                    <td><?php echo $cnsp ?></td>
                    <td><?php echo $local_acao ?></td>
                  </tr>
                <?php   } ?>

              </tbody>
            </table>
          </small>
        <?php } else { ?>
          <small>Nenhuma Ação Realizada Encontrada!</small>;
        <?php  }
      } else { ?>
        <small>Paciente não encontrado!</small>;
      <?php }
    } else {  ?>
      <small>ID do paciente não fornecido!</small>;
  <?php  }
  } ?>

    </div>





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

    <script type="text/javascript">
      var pag = "<?= $pag ?>"
    </script>