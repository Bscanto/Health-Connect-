<?php 
$pag = 'anamnese';
$tabela = 'paciente';

require_once("../../../../conexao.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];

}
?>


<div class="container">

<h3>Anamnese</h3>
</div>



<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>