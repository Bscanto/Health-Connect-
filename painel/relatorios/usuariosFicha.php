<?php
require_once("../../conexao.php");
include('data_formatada.php'); // Se tiver algo para formatar datas, etc.

// Pega ID do usuário
$id_usuario = @$_GET['id'];

// Verifica se foi passado
if (!$id_usuario) {
    echo '<p style="color: red; text-align: center;">ID do usuário não informado.</p>';
    exit;
}

// Busca no banco
$query = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$query->bindValue(':id', $id_usuario);
$query->execute();
$usuario = $query->fetch(PDO::FETCH_ASSOC);

// Caso não encontre
if (!$usuario) {
    echo '<p style="color: red; text-align: center;">Usuário não encontrado.</p>';
    exit;
}

// Monta dados
$nome = $usuario['nome'];
$email = $usuario['email'];
$telefone = $usuario['telefone'];
$sexo = $usuario['sexo'];
$cpf = $usuario['cpf'];

// Data de nascimento
$data_nasc = '';
if ($usuario['data_nasc'] != '0000-00-00') {
    $data_nasc = date('d/m/Y', strtotime($usuario['data_nasc']));
}

// Endereço
$endereco = $usuario['endereco'];
$numero   = $usuario['numero'];
$bairro   = $usuario['bairro'];
$cep      = $usuario['cep'];
$cidade   = $usuario['cidade'];
$estado   = $usuario['estado'];

// Outros
$nivel = $usuario['nivel'];
$ativo = ($usuario['ativo'] == 'Sim') ? 'Sim' : 'Não';
$cbo   = $usuario['cbo'];
$cnsp  = $usuario['cnsp'];

// Data de cadastro
$data_cad = '';
if ($usuario['data'] != '0000-00-00') {
    $data_cad = date('d/m/Y', strtotime($usuario['data']));
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
@import url('https://fonts.cdnfonts.com/css/tw-cen-mt-condensed');
@page {
    margin: 145px 20px 25px 20px;
}
#header { 
    position: fixed; 
    left: 0px; 
    top: -110px; 
    right: 0px; 
    height: 35px; 
    text-align: center; 
    padding-bottom: 100px; 
}
#content { margin-top: 0px; }
#footer { 
    position: fixed; 
    left: 0px; 
    bottom: -60px; 
    right: 0px; 
    height: 80px; 
}
#footer .page:after { content: counter(page, my-sec-counter); }
body { font-family: 'Tw Cen MT', sans-serif; font-size: 12px; }

.marca {
    position: fixed;
    left: 50;
    top: 100;
    width: 80%;
    opacity: 8%;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}
table, th, td {
    border: 1px solid #ccc;
}
th, td {
    padding: 8px;
    text-align: left;
    font-size: 10px;
}
th {
    background-color: #f2f2f2;
    text-transform: uppercase;
}
.titulo-sessao {
    margin-top: 30px;
    margin-bottom: 10px;
    font-weight: bold;
    font-size: 14px;
    text-transform: uppercase;
}
</style>
</head>
<body>

<?php 

 if ($marca_dagua == 'Sim') { 
  echo '<img class="marca" src="'.$url_sistema.'img/logo.jpg">'; 
 }
?>

<div id="header">
    <div style="border-style: solid; font-size: 10px; height: 50px;">
        <table style="width: 100%; border: 0px solid #ccc;">
            <tr>
                <td style="width: 7%; text-align: left;">
                    <img style="margin-top: 10px; margin-left: 10px;" 
                         src="<?php echo $url_sistema ?>img/logo.jpg" width="120px">
                </td>
                <td style="width: 40%; text-align: right; font-size: 9px; padding-right: 10px;">
                    <b><big>RELATÓRIO DE USUÁRIO</big></b><br>
                    <?php echo mb_strtoupper($data_hoje) ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<div id="footer" class="row">
    <hr style="margin-bottom: 0;">
    <table style="width:100%;">
        <tr>
            <td style="width:60%; font-size: 10px; text-align: left;">
                <?php echo $nome_sistema ?> 
                Telefone: <?php echo $telefone_sistema ?>
            </td>
            <td style="width:40%; font-size: 10px; text-align: right;">
                <p class="page">Página </p>
            </td>
        </tr>
    </table>
</div>

<div id="content" style="margin-top: 0;">
    <h2 style="text-align:center;">Ficha do Usuário</h2>

    <!-- Informações Pessoais -->
    <div class="titulo-sessao">Informações Pessoais</div>
    <table>
        <tr><th>Nome</th><td><?php echo $nome; ?></td></tr>
        <tr><th>Email</th><td><?php echo $email; ?></td></tr>
        <tr><th>Telefone</th><td><?php echo $telefone; ?></td></tr>
        <tr><th>Sexo</th><td><?php echo $sexo; ?></td></tr>
        <tr><th>CPF</th><td><?php echo $cpf; ?></td></tr>
        <tr><th>Data de Nascimento</th><td><?php echo $data_nasc; ?></td></tr>
    </table>

    <!-- Endereço -->
    <div class="titulo-sessao">Endereço</div>
    <table>
        <tr><th>Endereço</th><td><?php echo $endereco; ?></td></tr>
        <tr><th>Número</th><td><?php echo $numero; ?></td></tr>
        <tr><th>Bairro</th><td><?php echo $bairro; ?></td></tr>
        <tr><th>CEP</th><td><?php echo $cep; ?></td></tr>
        <tr><th>Cidade</th><td><?php echo $cidade; ?></td></tr>
        <tr><th>Estado</th><td><?php echo $estado; ?></td></tr>
    </table>

    <!-- Outros -->
    <div class="titulo-sessao">Outros</div>
    <table>
        <tr><th>Nível</th><td><?php echo $nivel; ?></td></tr>
        <tr><th>Ativo</th><td><?php echo $ativo; ?></td></tr>
        <tr><th>CBO</th><td><?php echo $cbo; ?></td></tr>
        <tr><th>CNSP</th><td><?php echo $cnsp; ?></td></tr>
        <tr><th>Data de Cadastro</th><td><?php echo $data_cad; ?></td></tr>
    </table>
</div>
</body>
</html>
