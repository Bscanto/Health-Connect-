<?php
session_start();

require '../dompdf/vendor/autoload.php'; 

use Dompdf\Dompdf;
$caminhoImagem = realpath(__DIR__ . '/../../img/logo.jpg');

if (!file_exists($caminhoImagem)) {
    die('A imagem não foi encontrada no caminho especificado: ' . $caminhoImagem);
}



$options = new \Dompdf\Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);


// Receba os dados via POST
$id_dados = $_POST['id_dados'];
$nome_dados = $_POST['nome_dados'];
$data_cad_dados = $_POST['data_cad_dados'];
$cns_dados = $_POST['cns_dados'];
$email_dados = $_POST['email_dados'];
$cpf_dados = $_POST['cpf_dados'];
$telefone_dados = $_POST['telefone_dados'];
$celular_dados = $_POST['celular_dados'];
$data_nasc_dados = $_POST['data_nasc_dados'];
$sexo_dados = $_POST['sexo_dados'];
$raca_dados = $_POST['raca_dados'];
$nacionalidade_dados = $_POST['nacionalidade_dados'];
$nome_responsavel_dados = $_POST['nome_responsavel_dados'];
$nome_mae_dados = $_POST['nome_mae_dados'];
$ocupacao_mae_dados = $_POST['ocupacao_mae_dados'];
$nome_pai_dados = $_POST['nome_pai_dados'];
$ocupacao_pai_dados = $_POST['ocupacao_pai_dados'];
$queixa_dados = $_POST['queixa_dados'];
$endereco_dados = $_POST['endereco_dados'];
$numero_dados = $_POST['numero_dados'];
$bairro_dados = $_POST['bairro_dados'];
$cidade_dados = $_POST['cidade_dados'];
$estado_dados = $_POST['estado_dados'];
$cep_dados = $_POST['cep_dados'];
$escolaridade_pai_dados = $_POST['escolaridade_pai_dados'];
$escolaridade_mae_dados = $_POST['escolaridade_mae_dados'];
$turno = $_POST['turno'];
$serie_dados = $_POST['serie_dados'];
$tipo_escola = $_POST['tipo_escola'];
$nome_escola_dados = $_POST['nome_escola_dados'];
$anamese = $_POST['anamese'];
$historico_clinico = $_POST['historico_clinico'];


$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @page { margin: 145px 20px 25px 20px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { text-align: center; font-size: 18px; }
        h2 { font-size: 16px; border-bottom: 1px solid #000; }
        .section { margin-bottom: 20px; }
        .info { margin-bottom: 5px; }
        .label { font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table td { padding: 5px; border: 1px solid #ccc; }

        .marca {
            position: fixed;
            left: 50px; /* Adicionada unidade 'px' */
            top: 120px;  /* Adicionada unidade 'px' */
            width: 80%;
            opacity: 0.08; /* Opacidade entre 0 e 1 */
        }
    </style>
</head>
<body>
    <!-- Marca d'água incorporada como Base64 -->
   
    <h1>Ficha do Paciente</h1>
    <p style="text-align: center;  font-size: 16px;  font-weight: bold;"> {$nome_dados}</p>


    <div class="header">
        <p>Prontuário: {$id_dados}</p>
        <p>Data de Cadastro: {$data_cad_dados}</p>
    </div>

    <div class="section">
        <h2>Informações Pessoais</h2>
        <table>
            <tr>
                <td><span class="label">CNS:</span> {$cns_dados}</td>
                <td><span class="label">Email:</span> {$email_dados}</td>
                <td><span class="label">CPF:</span> {$cpf_dados}</td>
            </tr>
            <tr>
                <td><span class="label">Telefone:</span> {$telefone_dados}</td>
                <td><span class="label">Celular:</span> {$celular_dados}</td>
                <td><span class="label">Data de Nascimento:</span> {$data_nasc_dados}</td>
            </tr>
            <tr>
                <td><span class="label">Sexo:</span> {$sexo_dados}</td>
                <td><span class="label">Raça/Cor:</span> {$raca_dados}</td>
                <td><span class="label">Nacionalidade:</span> {$nacionalidade_dados}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Informações dos Pais/Responsável</h2>
        <table>
            <tr>
                <td><span class="label">Nome do Responsável:</span> {$nome_responsavel_dados}</td>
            </tr>
            <tr>
                <td><span class="label">Nome da Mãe:</span> {$nome_mae_dados}</td>
                <td><span class="label">Ocupação da Mãe:</span> {$ocupacao_mae_dados}</td>
            </tr>
            <tr>
                <td><span class="label">Nome do Pai:</span> {$nome_pai_dados}</td>
                <td><span class="label">Ocupação do Pai:</span> {$ocupacao_pai_dados}</td>
            </tr>
            <tr>
                <td colspan="2"><span class="label">Queixa:</span> {$queixa_dados}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Endereço</h2>
        <table>
            <tr>
                <td><span class="label">Endereço:</span> {$endereco_dados}</td>
                <td><span class="label">Número:</span> {$numero_dados}</td>
                <td><span class="label">Bairro:</span> {$bairro_dados}</td>
            </tr>
            <tr>
                <td><span class="label">Cidade:</span> {$cidade_dados}</td>
                <td><span class="label">Estado:</span> {$estado_dados}</td>
                <td><span class="label">CEP:</span> {$cep_dados}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Escolaridade</h2>
        <table>
            <tr>
                <td><span class="label">Escolaridade Pai:</span> {$escolaridade_pai_dados}</td>
                <td><span class="label">Escolaridade Mãe:</span> {$escolaridade_mae_dados}</td>
            </tr>
            <tr>
                <td><span class="label">Turno:</span> {$turno}</td>
                <td><span class="label">Série:</span> {$serie_dados}</td>
                <td><span class="label">Tipo Escola:</span> {$tipo_escola}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="label">Nome Escola:</span> {$nome_escola_dados}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Anamnese</h2>
        <div>{$anamese}</div>
    </div>

    <div class="section">
        <h2>Histórico Clínico</h2>
        <div>{$historico_clinico}</div>
    </div>
</body>
</html>
HTML;
// Inicialize o Dompdf
$dompdf = new Dompdf();

// Carregue o HTML
$dompdf->loadHtml($html);

// (Opcional) Defina o tamanho e a orientação do papel
$dompdf->setPaper('A4', 'portrait');

// Renderize o PDF
$dompdf->render();

// Envie o PDF para o navegador
$dompdf->stream('ficha_paciente.pdf', ['Attachment' => false]);
