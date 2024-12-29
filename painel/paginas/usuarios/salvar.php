<?php 
$tabela = 'usuarios';
require_once("../../../conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nivel = $_POST['nivel'];
$endereco = $_POST['endereco'];
$estado = $_POST['estado'];  
$cidade = $_POST['cidade'];  
$bairro = $_POST['bairro'];  
$cep = $_POST['cep'];       
$data_nasc = $_POST['data_nasc']; 
$sexo = $_POST['sexo'];      
$cpf = $_POST['cpf'];        
$cbo = $_POST['cbo'];        
$cnsp = $_POST['cnsp'];      
$senha = '123';
$senha_crip = sha1($senha);
$id = $_POST['id'];



if($id == ""){
    $query = $pdo->prepare("INSERT INTO $tabela SET 
        nome = :nome, 
        email = :email, 
        senha = '', 
        senha_crip = '$senha_crip', 
        nivel = '$nivel', 
        ativo = 'Sim', 
        foto = 'sem-foto.jpg', 
        telefone = :telefone, 
        data = curDate(), 
        endereco = :endereco,
        estado = :estado,
        cidade = :cidade,
        bairro = :bairro,
        cep = :cep,
        data_nasc = :data_nasc,
        sexo = :sexo,
        cpf = :cpf,
        cbo = :cbo,
        cnsp = :cnsp
    ");
} else {
    $query = $pdo->prepare("UPDATE $tabela SET 
        nome = :nome, 
        email = :email, 
        nivel = '$nivel', 
        telefone = :telefone, 
        endereco = :endereco,
        estado = :estado,
        cidade = :cidade,
        bairro = :bairro,
        cep = :cep,
        data_nasc = :data_nasc,
        sexo = :sexo,
        cpf = :cpf,
        cbo = :cbo,
        cnsp = :cnsp 
        WHERE id = '$id'
    ");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":estado", "$estado"); 
$query->bindValue(":cidade", "$cidade"); 
$query->bindValue(":bairro", "$bairro"); 
$query->bindValue(":cep", "$cep");       
$query->bindValue(":data_nasc", "$data_nasc"); 
$query->bindValue(":sexo", "$sexo");     
$query->bindValue(":cpf", "$cpf");       
$query->bindValue(":cbo", "$cbo");       
$query->bindValue(":cnsp", "$cnsp");     
$query->execute();

  // Recupera o ID do último prontuário inserido
$prontuario_id = $pdo->lastInsertId();
echo 'Salvo com Sucesso';