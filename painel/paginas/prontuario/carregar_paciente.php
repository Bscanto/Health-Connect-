<?php 


$tabela = 'paciente';
   // Consulta ao banco de dados para obter os dados do paciente
	 $query = $pdo->query("SELECT * from $tabela order by id desc");
	 $res = $query->fetchAll(PDO::FETCH_ASSOC);
	 $linhas = @count($res);
	 if($linhas > 0){
		 for($i=0; $i<$linhas; $i++){
			 $id = $res[$i]['id'];
			 $nome = $res[$i]['nome'];
			 $cpf = $res[$i]['cpf'];    
			 $telefone = $res[$i]['telefone'];
			 $email = $res[$i]['email'];
			 $ativo = $res[$i]['ativo'];
			 $estado = $res[$i]['estado'];
			 $cidade = $res[$i]['cidade'];
			 $bairro = $res[$i]['bairro'];
			 $endereco = $res[$i]['endereco'];
			 $cep = $res[$i]['cep'];
			 $numero = $res[$i]['numero'];
			 $data_nasc = $res[$i]['data_nasc'];
			 $sexo = $res[$i]['sexo'];
			 $cns = $res[$i]['cns'];
			 $nome_responsavel = $res[$i]['nome_responsavel'];
			 $nome_pai = $res[$i]['nome_pai'];
			 $ocupacao_pai = $res[$i]['ocupacao_pai'];
			 $nome_mae = $res[$i]['nome_mae'];
			 $ocupacao_mae = $res[$i]['ocupacao_mae'];
			 $celular = $res[$i]['celular'];
			 $raca = $res[$i]['raca'];
			 $nacionalidade = $res[$i]['nacionalidade'];
			 $queixa = $res[$i]['queixa'];
			 $data_cad = $res[$i]['data_cad'];
		 
		 
		 
			 $data_nascF = implode('/', array_reverse(explode('-', $data_nasc)));
		 }			
	 
	 }