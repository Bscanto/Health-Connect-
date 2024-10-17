<?php

$tabela = 'anamnese2';

require_once("../../../conexao.php");

$id_paciente = @$_POST['id'];


$query = $pdo->query("SELECT * FROM grupo_ana ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {

	for ($i = 0; $i < $total_reg; $i++) {
		foreach ($res[$i] as $key => $value) {
		}
		$id = $res[$i]['id'];
		$nome = $res[$i]['nome'];
		$descricao = $res[$i]['descricao'];
		$ocultar_desc = '';
		if ($descricao == "") {
			$ocultar_desc = 'ocultar';
		}


		$checked = '';
		$query3 = $pdo->query("SELECT * FROM itens_ana where grupo = '$id' order by id asc");
		$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
		$total_reg3 = @count($res3);
		if ($total_reg3 > 0) {
			echo '<span class="titulo-grupo"><b>' . $nome . '</b></span><span class="' . $ocultar_desc . '" style="margin-left:5px; font-size: 13px">(' . $descricao . ')</span><br><div class="row">';

			for ($i3 = 0; $i3 < $total_reg3; $i3++) {
				foreach ($res3[$i3] as $key => $value) {
				}
				$nome = $res3[$i3]['nome'];
				$descricao = $res3[$i3]['descricao'];
				$id = $res3[$i3]['id'];

				$query2 = $pdo->query("SELECT * FROM anamnese where paciente = '$id_paciente' and item = '$id'");
				$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
				$total_reg2 = @count($res2);
				if ($total_reg2 > 0) {
					$descricao_ana = $res2[0]['descricao'];
					$checked = 'checked';
				} else {
					$checked = '';
					$descricao_ana = '';
				}

				echo '
		<div class="form-check col-md-12">
		<input class="form-check-input" type="checkbox" value="" id="" ' . $checked . ' onclick="adicionarItem(' . $id . ',' . $id_paciente . ')">
		<label class="labelcheck" style="font-size:13px">
		' . $nome . '
		</label>
		<input type="text" style="border:none; border-bottom:1px solid #000; width:60%; margin-left:5px; font-size:15px" id="desc_' . $id . '" onfocusout="adicionarDesc(' . $id . ',' . $id_paciente . ')" value="' . $descricao_ana . '"/>
		</div>
		<br>
		';
			}
			echo '</div><hr style="border: 1px solid red;"> <br>';
		}
	}
}
