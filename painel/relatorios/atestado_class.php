<?php 

require_once("../../conexao.php");

$id = $_POST['id'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$obs = urlencode(@$_POST['obs']);
$motivo = urlencode(@$_POST['motivo']);


// Consultar dados do paciente no banco de dados
$query = $pdo->prepare("SELECT * FROM paciente WHERE id = :id");
$query->execute(['id' => $id]);
$paciente = $query->fetch(PDO::FETCH_ASSOC);

$nome_paciente = $paciente['nome'];
$cpf_paciente = $paciente['cpf'];

// Construir a URL para o conteúdo HTML
$url = $url_sistema . "painel/relatorios/atestado.php?id=$id&dataInicial=$dataInicial&dataFinal=$dataFinal&obs=$obs&motivo=$motivo";

// Obter o conteúdo HTML da URL
$html = file_get_contents($url);

// Verificar se o conteúdo HTML foi carregado corretamente
if ($html === false) {
    die("Erro ao carregar o conteúdo HTML do atestado.");
}

// Carregar a biblioteca Dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Configurar o cabeçalho para enviar o PDF
header("Content-Transfer-Encoding: binary");
header("Content-Type: application/pdf");

// Inicializar a classe Dompdf
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$pdf = new Dompdf($options);

// Definir o tamanho do papel e orientação
$pdf->set_paper('A4', 'portrait');

// Carregar o conteúdo HTML no Dompdf
$pdf->load_html($html);

// Renderizar o PDF
$pdf->render();

// Enviar o PDF para o navegador
$pdf->stream(
    'atestado_' . $nome_paciente . '.pdf',
    array("Attachment" => false) // false para exibir no navegador
);
?>
