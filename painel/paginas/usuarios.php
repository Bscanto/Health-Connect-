<?php

$pag = 'usuarios';
?>


<a onclick="inserir()" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Usuário</a>

<div class="bs-example widget-shadow" style="padding: 15px;" id="listar">

</div>


<!-- Modal perfil -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
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
            <div class="col-md-6">
              <label>Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu Nome" required>
            </div>

            <div class="col-md-6">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Seu Email" required>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <label>Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Seu Telefone" required>
            </div>


            <div class="col-md-6">
              <label>Nível</label>
              <select class="form-control" name="nivel" id="nivel" required>
                <option>Administrador</option>
                <option>Diretor</option>
              </select>
            </div>

          </div>

          <div class="row">
            <div class="col-md-12">
              <label>Endereço</label>
              <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Seu Endereço">
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


<!-- Modal dados mostrar -->
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><span id="titulo_dados"></span></h4>
        <button id="btn-fechar-dados" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row" style="margin-top: 0px">
          <div class="col-md-6" style="margin-bottom: 5px">
            <span><b>Telefone: </b></span><span id="telefone_dados"></span>
          </div>


          <div class="col-md-8" style="margin-bottom: 5px">
            <span><b>Email: </b></span><span id="email_dados"></span>
          </div>



          <div class="col-md-4" style="margin-bottom: 5px">
            <span><b>Senha: </b></span><span id="senha_dados"></span>
          </div>

          <div class="col-md-6" style="margin-bottom: 5px">
            <span><b>Nível: </b></span><span id="nivel_dados"></span>
          </div>

          <div class="col-md-6" style="margin-bottom: 5px">
            <span><b>Ativo: </b></span><span id="ativo_dados"></span>
          </div>

          <div class="col-md-6" style="margin-bottom: 5px">
            <span><b>Data Cadastro: </b></span><span id="data_cad_dados"></span>
          </div>

          <div class="col-md-12" style="margin-bottom: 5px">
            <span><b>Endereço: </b></span><span id="endereco_dados"></span>
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