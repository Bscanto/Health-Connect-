<?php 
$tabela = 'paciente';
require_once("../../../conexao.php");


$nome = $_POST['nome'];
$cns = $_POST['cns'];  
$cpf = $_POST['cpf'];
$email = $_POST['email']; 
$data_nasc = $_POST['data_nasc'];
$sexo = $_POST['sexo'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero']; 
$cep = $_POST['cep'];  
$bairro = $_POST['bairro'];  
$cidade = $_POST['cidade'];  
$estado = $_POST['estado'];  
$nome_responsavel = $_POST['nome_responsavel'];
$nome_mae = $_POST['nome_mae'];  
$ocupacao_mae = $_POST['ocupacao_mae']; 
$nome_pai = $_POST['nome_pai'];  
$ocupacao_pai = $_POST['ocupacao_pai'];  
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$raca = $_POST['raca'];  
$nacionalidade = $_POST['nacionalidade'];  
$data_cad = $_POST['data_cad'];  
$queixa = $_POST['queixa'];
$id = $_POST['id'];



// Validação cns
$query = $pdo->query("SELECT * from $tabela where cns = '$cns'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id != $id_reg){
	echo $id;
    echo 'Cartão Nacional de saúde já Cadastrado!';
    exit();
}


if ($id == "") {  
	// Inserir novo registro
	$query = $pdo->prepare("INSERT INTO paciente SET
			nome = :nome, 
			cpf = :cpf,
			telefone = :telefone,
			email = :email,
			ativo = 'Sim',
			estado = :estado,
			cidade = :cidade,
			bairro = :bairro,
			endereco = :endereco,
			cep = :cep,
			numero = :numero,
			data_nasc = :data_nasc,
			sexo =:sexo,
			cns = :cns,
			nome_responsavel = :nome_responsavel,
			nome_pai = :nome_pai,
			ocupacao_pai = :ocupacao_pai,
			nome_mae = :nome_mae,
			ocupacao_mae = :ocupacao_mae,
			celular = :celular,
			raca = :raca,
			nacionalidade = :nacionalidade,
			queixa = :queixa,
			data_cad = :data_cad ");

} else {
	// Atualizar registro existente
	$query = $pdo->prepare("UPDATE paciente SET
			nome = :nome, 
			cpf = :cpf,
			telefone = :telefone,
			email = :email,
			estado = :estado,
			cidade = :cidade,
			bairro = :bairro,
			endereco = :endereco,
			cep = :cep,
			numero = :numero,
			data_nasc = :data_nasc,
			sexo =:sexo,
			cns = :cns,
			nome_responsavel = :nome_responsavel,
			nome_pai = :nome_pai,
			ocupacao_pai = :ocupacao_pai,
			nome_mae = :nome_mae,
			ocupacao_mae = :ocupacao_mae,
			celular = :celular,
			raca = :raca,
			nacionalidade = :nacionalidade,
			queixa = :queixa,
			data_cad = :data_cad 
			WHERE id = :id");
	$query->bindValue(':id', $id);

}


		

// Atribuindo valores aos parâmetros
$query->bindValue(':nome', $nome);
$query->bindValue(':cpf', $cpf);
$query->bindValue(':telefone', $telefone);
$query->bindValue(':email', $email);
$query->bindValue(':estado', $estado);
$query->bindValue(':cidade', $cidade);
$query->bindValue(':bairro', $bairro);
$query->bindValue(':endereco', $endereco);
$query->bindValue(':cep', $cep);
$query->bindValue(':numero', $numero);
$query->bindValue(':data_nasc', $data_nasc);
$query->bindValue(':sexo', $sexo);
$query->bindValue(':cns', $cns);
$query->bindValue(':nome_responsavel', $nome_responsavel);
$query->bindValue(':nome_pai', $nome_pai);
$query->bindValue(':ocupacao_pai', $ocupacao_pai);
$query->bindValue(':nome_mae', $nome_mae);
$query->bindValue(':ocupacao_mae', $ocupacao_mae);
$query->bindValue(':celular', $celular);
$query->bindValue(':raca', $raca);
$query->bindValue(':nacionalidade', $nacionalidade);
$query->bindValue(':queixa', $queixa);
$query->bindValue(':data_cad', $data_cad);
$query->execute();

echo 'Salvo com Sucesso';

