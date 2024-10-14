<?php 
$tabela = 'paciente';
require_once("../../../conexao.php");


$query = $pdo->query("SELECT p.*, e.escolaridade_pai, e.escolaridade_mae, e.tipo_escola, e.turno, e.serie, e.data_escol, esc.nome_escola
    FROM $tabela AS p
    LEFT JOIN escolaridade AS e ON e.fk_paciente_id = p.id
    LEFT JOIN escola AS esc ON e.fk_escola_id = esc.id
    ORDER BY p.id DESC
");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
if($linhas > 0){
echo <<<HTML
<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Nome</th>	
	<th class="esc">CPF</th>	
	<th class="esc">Telefone</th>	
	<th class="esc">Data de Nascimento</th>
	<th class="esc">cns</th>
	<th class="esc">Nome Responsável</th>		
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;


for($i=0; $i<$linhas; $i++){
	$id = $res[$i]['id'];
	$nome = $res[$i]['nome'];
	$cpf = $res[$i]['cpf'];    
	$telefone = $res[$i]['telefone'];
	$email = $res[$i]['email'];
	$ativo = $res[$i]['ativo'];
	$estado = $res[$i]['estado'];
	$cidade = $res[$i]['cidade'];
	$bairro = $res[$i]['bairro'];
	$endereco = $res[$i]['endereco'];
	$cep = $res[$i]['cep'];
	$numero = $res[$i]['numero'];
	$data_nasc = $res[$i]['data_nasc'];
	$sexo = $res[$i]['sexo'];
	$cns = $res[$i]['cns'];
	$nome_responsavel = $res[$i]['nome_responsavel'];
	$nome_pai = $res[$i]['nome_pai'];
	$ocupacao_pai = $res[$i]['ocupacao_pai'];
	$nome_mae = $res[$i]['nome_mae'];
	$ocupacao_mae = $res[$i]['ocupacao_mae'];
	$celular = $res[$i]['celular'];
	$raca = $res[$i]['raca'];
	$nacionalidade = $res[$i]['nacionalidade'];
	$queixa = $res[$i]['queixa'];
	$escolaridade_pai = $res[$i]['escolaridade_pai'];
	$escolaridade_mae = $res[$i]['escolaridade_mae'];
	$tipo_escola = $res[$i]['tipo_escola'];
	$turno = $res[$i]['turno'];
	$serie = $res[$i]['serie'];
	$data_escolaridade = $res[$i]['data_escolaridade'];
	$data_escolaridade = $res[$i]['data_escolaridade'];
	$nome_escola = $res[$i]['nome_escola'];



	$data_nascF = implode('/', array_reverse(explode('-', $data_nasc)));


echo <<<HTML
<tr>
<td>
<input type="checkbox" id="seletor-{$id}" class="form-check-input" onchange="selecionar('{$id}')">
{$nome}
</td>
<td class="esc">{$cpf}</td>
<td class="esc">{$telefone}</td>
<td class="esc">{$data_nascF}</td>
<td class="esc">{$cns}</td>
<td class="esc">{$nome_responsavel}</td>
<td>
	<big><a href="#" onclick="editar('{$id}','{$nome}','{$cpf}','{$telefone}', '{$email}', '{$estado}', '{$cidade}', '{$bairro}', '{$endereco}', '{$cep}', '{$numero}', '{$data_nasc}', '{$sexo}', '{$cns}', '{$nome_responsavel}', '{$nome_pai}', '{$ocupacao_pai}', '{$nome_mae}', '{$ocupacao_mae}', '{$celular}', '{$raca}', '{$nacionalidade}', '{$queixa}', '{$data_cad}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

	<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
</li>

<big><a href="#" onclick="mostrar('{$id}','{$nome}','{$cpf}','{$telefone}', '{$email}', '{$ativo}', '{$estado}', '{$cidade}', '{$bairro}', '{$endereco}', '{$cep}', '{$numero}', '{$data_nasc}', '{$sexo}', '{$cns}', '{$nome_responsavel}', '{$nome_pai}', '{$ocupacao_pai}', '{$nome_mae}', '{$ocupacao_mae}', '{$celular}', '{$raca}', '{$nacionalidade}', '{$queixa}', '{$data_cad}', '{$escolaridade_pai}', '{$escolaridade_mae}', '{$tipo_escola}', '{$turno}', '{$serie}', '{$data_escolaridade}', '{$nome_escola}')" title="Mostrar Dados"><i class="fa fa-info-circle text-primary"></i></a></big>

<big><a href="#" onclick="escolaridade('{$id}')" title="Editar Escolaridade"><i class="fa fa-book text-warning"></i></a></big>


<big><a href="#" onclick="anamnese('{$id}')" title="Editar Anamnese"><i class="fa fa-stethoscope text-green"></i></a></big>

</td>
</tr>
HTML;

}


echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>
HTML;

}else{
	echo '<small>Nenhum Registro Encontrado!</small>';
}


?>



<script type="text/javascript">
	$(document).ready( function () {		
    $('#tabela').DataTable({
    	"language" : {
            //"url" : '//cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
        },
        "ordering": false,
		"stateSave": true
    });
} );
</script>

<script type="text/javascript">
	function editar(id,nome,cpf,telefone, email, estado, cidade, bairro, endereco, cep, numero, data_nasc, sexo, cns, nome_responsavel, nome_pai, ocupacao_pai, nome_mae, ocupacao_mae, celular, raca, nacionalidade, queixa, data_cad){
		$('#mensagem').text('');
    	$('#titulo_inserir').text('Editar Registro');

$('#id').val(id);

$('#nome').val(nome);
$('#cpf').val(cpf);
$('#telefone').val(telefone);
$('#email').val(email);
$('#estado').val(estado);
$('#cidade').val(cidade);
$('#bairro').val(bairro);
$('#endereco').val(endereco);
$('#cep').val(cep);
$('#numero').val(numero);
$('#data_nasc').val(data_nasc);
$('#sexo').val(sexo).change();
$('#cns').val(cns);
$('#nome_responsavel').val(nome_responsavel);
$('#nome_pai').val(nome_pai);
$('#ocupacao_pai').val(ocupacao_pai);
$('#nome_mae').val(nome_mae);
$('#ocupacao_mae').val(ocupacao_mae);
$('#celular').val(celular);
$('#raca').val(raca);
$('#nacionalidade').val(nacionalidade);
$('#queixa').val(queixa);
$('#data_cad').val(data_cad);

    	$('#modalForm').modal('show');
	}
  

	function mostrar(id, nome, cpf, telefone, email, ativo, estado, cidade, bairro, endereco, cep, numero, data_nasc, sexo, cns, nome_responsavel, nome_pai, ocupacao_pai, nome_mae, ocupacao_mae, celular, raca, nacionalidade, queixa, data_cad, escolaridade_pai, escolaridade_mae, tipo_escola, turno, serie, data_escolaridade, escola_nome) {

// Atualizando o título da modal
$('#titulo_dados').text('Detalhes do Paciente - ' + nome);

// Preenchendo os dados do paciente
$('#nome_dados').text(nome);
$('#cpf_dados').text(cpf);
$('#telefone_dados').text(telefone);
$('#email_dados').text(email);
$('#ativo_dados').text(ativo);
$('#estado_dados').text(estado);
$('#cidade_dados').text(cidade);
$('#bairro_dados').text(bairro);
$('#endereco_dados').text(endereco);
$('#cep_dados').text(cep);
$('#numero_dados').text(numero);
$('#data_nasc_dados').text(data_nasc);
$('#sexo_dados').text(sexo);
$('#cns_dados').text(cns);
$('#nome_responsavel_dados').text(nome_responsavel);
$('#nome_pai_dados').text(nome_pai);
$('#ocupacao_pai_dados').text(ocupacao_pai);
$('#nome_mae_dados').text(nome_mae);
$('#ocupacao_mae_dados').text(ocupacao_mae);
$('#celular_dados').text(celular);
$('#raca_dados').text(raca);
$('#nacionalidade_dados').text(nacionalidade);
$('#queixa_dados').text(queixa);

// Preenchendo os dados de escolaridade e escola
$('#nome_escola_dados').text(escola_nome);
$('#escolaridade_pai_dados').text(escolaridade_pai);
$('#escolaridade_mae_dados').text(escolaridade_mae);
$('#tipo_escola_dados').text(tipo_escola);
$('#turno_dados_dados').text(turno);
$('#serie_dados').text(serie);
$('#data_escol_dados').text(data_escolaridade);

// Exibir a modal com os dados preenchidos
$('#modalDados').modal('show');

			//listarHistorico(id_paciente);

			//listarAnaPac(id_paciente);


	}

	function limparCampos(){
		$('#id').val('');
    $('#nome').val('');
    $('#cpf').val('');
    $('#telefone').val('');
    $('#email').val('');
    $('#estado').val('');
    $('#cidade').val('');
    $('#bairro').val('');
    $('#endereco').val('');
    $('#cep').val('');
    $('#numero').val('');
    $('#data_nasc').val('');
    $('#sexo').val('');
    $('#cns').val('');
    $('#nome_responsavel').val('');
    $('#nome_pai').val('');
    $('#ocupacao_pai').val('');
    $('#nome_mae').val('');
    $('#ocupacao_mae').val('');
    $('#celular').val('');
    $('#raca').val('');
    $('#nacionalidade').val('');
    $('#queixa').val('');
    $('#data_cad').val('');

    	$('#ids').val('');
    	$('#btn-deletar').hide();	
	}		

	function selecionar(id){

		var ids = $('#ids').val();

		if($('#seletor-'+id).is(":checked") == true){
			var novo_id = ids + id + '-';
			$('#ids').val(novo_id);
		}else{
			var retirar = ids.replace(id + '-', '');
			$('#ids').val(retirar);
		}

		var ids_final = $('#ids').val();
		if(ids_final == ""){
			$('#btn-deletar').hide();
		}else{
			$('#btn-deletar').show();
		}
	}

	function deletarSel(){
		var ids = $('#ids').val();
		var id = ids.split("-");
		
		for(i=0; i<id.length-1; i++){
			excluir(id[i]);			
		}

		limparCampos();
	}



function listarHistorico(id){

	pag = 'consultas';

	$.ajax({

        url: 'paginas/' + pag + "/listar_historico.php",

        method: 'POST',

        data: {id},

        dataType: "html",



        success:function(result){

            $("#historico_div").html(result);

            

        }

    });

}

</script>

