<?php
require_once("../../conexao.php");

// Pega o ID do usuário que veio via GET
$id = @$_GET['id'];

// Monta a URL para a página que vai gerar o HTML do PDF (usuariosFicha.php)
$pagina_html = $url_sistema."painel/relatorios/usuariosFicha.php?id=".$id;

// Carrega o conteúdo da página (HTML) dentro de uma string
$html = file_get_contents($pagina_html);

// CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Headers
header("Content-Transfer-Encoding: binary");
header("Content-Type: application/pdf");

// INICIALIZAR A CLASSE DO DOMPDF
$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new Dompdf($options);

// Definir o tamanho do papel e a orientação da página
$pdf->set_paper('A4', 'portrait');

// CARREGAR O CONTEÚDO HTML
$pdf->load_html($html);

// RENDERIZAR O PDF
$pdf->render();

// NOMEAR O PDF GERADO e decidir se faz download ou exibe
$pdf->stream(
    'ficha-usuario.pdf',
    array("Attachment" => false) // false = abre no navegador
);
