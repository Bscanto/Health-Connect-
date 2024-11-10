<?php 

$pag = 'grupos_ana';

if(@$grupos_ana == 'ocultar'){
	echo "<script>window.location='../index.php'</script>";
    exit();
}

 ?>

<a onclick="inserir()" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Grupo</a>

<li class="dropdown head-dpdn2" style="display: inline-block;">		

		<a href="#" data-toggle="dropdown"  class="btn btn-danger dropdown-toggle" id="btn-deletar" style="display:none"><span class="fa fa-trash-o"></span> Deletar</a>

		<ul class="dropdown-menu">
		<li>
		<div class="notification_desc2">
		<p>Excluir Selecionados? <a href="#" onclick="deletarSel()"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
</li>

<div class="bs-example widget-shadow" style="padding:15px" id="listar">

</div>

<input type="hidden" id="ids">

<!-- Modal Perfil -->
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
						<div class="col-md-12">							
								<label>Nome</label>
								<input maxlength="255" type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Grupo" required>	
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">							
								<label>Descrição</label>
								<input maxlength="2000" type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição se Houver" >							
						</div>

					</div>
					<input type="hidden" class="form-control" id="id" name="id">					
				<br>
				<small><div id="mensagem" align="center"></div></small>
			</div>

			<div class="modal-footer">       
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">var pag = "<?=$pag?>"</script>

<script src="js/ajax.js"></script>






