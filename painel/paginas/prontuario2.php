<?php 

$pag = 'prontuario';


require_once("../conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 
?>

<a href="pacientes" type="button" class="btn btn-primary">
    <span class="fa fa-circle-chevron-left"></span> Voltar
</a>
<br>
<br>

<div class="container bg-silver" style="width: 85%;">
    <br>
    <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
        <button type="button" class="btn btn-outline-primary" onclick="carregarPaciente('identificacao', <?= $id ?>)">Identificação</button>
        <button type="button" class="btn btn-outline-primary" onclick="carregarPaciente('escolaridade', <?= $id ?>)">Escolaridade</button>
        <button type="button" class="btn btn-outline-primary" onclick="carregarPaciente('anamnese', <?= $id ?>)">Anamnese</button>
        <button type="button" class="btn btn-outline-primary" onclick="carregarPaciente('dados_atendimento', <?= $id ?>)">Dados Atendimento</button>
        <button type="button" class="btn btn-outline-primary" onclick="carregarPaciente('acoes_realizadas', <?= $id ?>)">Ações Realizadas</button>
    </div>

    <!-- Div para exibir os dados do paciente -->
    <div id="mostrar_paciente" style="margin-top: 20px;"></div>
</div>

<script type="text/javascript">
    function carregarPaciente(buttonType, pacienteId) {
        var url = ""; // Inicializa a variável de URL
        switch (buttonType) {
            case "identificacao":
                url = "paginas/<?= $pag ?>/identificacao/identificacao.php?id=" + pacienteId; // Adiciona o id à URL
                break;
            case "escolaridade":
                url = "paginas/<?= $pag ?>/escolaridade/escolaridade.php?id=" + pacienteId;
                break;
            case "anamnese":
                url = "paginas/<?= $pag ?>/anamnese/anamnese.php?id=" + pacienteId;
                break;
            case "dados_atendimento":
                url = "paginas/<?= $pag ?>/atendimento/atendimento.php?id=" + pacienteId;
                break;
            case "acoes_realizadas":
                url = "paginas/<?= $pag ?>/acao/acao.php?id=" + pacienteId;
                break;
            default:
                console.log("Erro: tipo de botão desconhecido");
                return; // Retorna para evitar o erro
        }

        // Faz a requisição AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('mostrar_paciente').innerHTML = xhr.responseText;
            } else {
                console.error('Erro ao carregar os dados do paciente.');
            }
        };
        xhr.send();
    }
</script>

<script type="text/javascript">
    var pag = "<?= $pag ?>"; 
</script>





</script>