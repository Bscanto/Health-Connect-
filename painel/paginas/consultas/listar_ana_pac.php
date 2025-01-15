<?php 

require_once("../../../conexao.php");

$id_paciente = @$_POST['id'];
$total_itens = 0;


$query = $pdo->query("SELECT * FROM grupo_ana ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

for($i=0; $i < $total_reg; $i++){
$id_grupo = $res[$i]['id'];
$nome_grupo = $res[$i]['nome'];

		$query2 = $pdo->query("SELECT * FROM anamnese where paciente = '$id_paciente' and grupo = '$id_grupo' ");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);

		if($total_reg2 > 0){
			$total_itens += 1;
			echo '<div style="color:black"><b>'.$nome_grupo.'</b></div><div style="margin-bottom:10px; border-bottom:1px solid #383838">';
			for($i2=0; $i2 < $total_reg2; $i2++){

			

			

			$descricao_ana = $res2[$i2]['descricao'];

			$item = $res2[$i2]['item'];



			$query3 = $pdo->query("SELECT * FROM itens_ana where id = '$item'");

$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);

$nome = $res3[0]['nome'];					



		echo '

		<div >

		<i class="fa fa-check text-success"></i>

		<label class="" style="font-size:13px">

		'.$nome.'

		</label>

		<span style="margin-left:3px; font-size:13px">'.$descricao_ana.'</span>

		</div>

		';



						} echo '</div>'; } } } 









if($total_itens == 0){

	echo '<span style="font-size:13px">Nenhuma Anamnese Lançada!</span>';

}



						?>