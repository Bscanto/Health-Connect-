<?php
require_once("../../../../conexao.php");

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    file_put_contents('log.txt', "Script acessado em: " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

    var_dump($_POST);
    // Log dos dados recebidos
    file_put_contents('log.txt', print_r($_POST, true), FILE_APPEND); // Logando os dados recebidos

    // Validações básicas
    $required_fields = ['id', 'nome', 'cpf', 'telefone', 'email'];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['error' => "O campo $field é obrigatório."]);
            exit();
        }
    }

    // Pegar os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $ativo = $_POST['ativo'] ?? '0'; // Definir como 0 se não for enviado
    $estado = $_POST['estado'] ?? null;
    $cidade = $_POST['cidade'] ?? null;
    $bairro = $_POST['bairro'] ?? null;
    $endereco = $_POST['endereco'] ?? null;
    $cep = $_POST['cep'] ?? null;
    $numero = $_POST['numero'] ?? null;
    $data_nasc = $_POST['data_nasc'] ?? null;
    $sexo = $_POST['sexo'] ?? null;
    $cns = $_POST['cns'] ?? null;
    $nome_responsavel = $_POST['nome_responsavel'] ?? null;
    $nome_pai = $_POST['nome_pai'] ?? null;
    $ocupacao_pai = $_POST['ocupacao_pai'] ?? null;
    $nome_mae = $_POST['nome_mae'] ?? null;
    $ocupacao_mae = $_POST['ocupacao_mae'] ?? null;
    $celular = $_POST['celular'] ?? null;
    $raca = $_POST['raca'] ?? null;
    $nacionalidade = $_POST['nacionalidade'] ?? null;
    $queixa = $_POST['queixa'] ?? null;

    // Preparar a query de atualização
    $query = "UPDATE paciente SET 
                nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, ativo = :ativo, 
                estado = :estado, cidade = :cidade, bairro = :bairro, endereco = :endereco, cep = :cep, 
                numero = :numero, data_nasc = :data_nasc, sexo = :sexo, cns = :cns, 
                nome_responsavel = :nome_responsavel, nome_pai = :nome_pai, ocupacao_pai = :ocupacao_pai, 
                nome_mae = :nome_mae, ocupacao_mae = :ocupacao_mae, celular = :celular, 
                raca = :raca, nacionalidade = :nacionalidade, queixa = :queixa 
              WHERE id = :id";

    try {
        // Preparar a declaração
        $stmt = $pdo->prepare($query);

        // Associar os parâmetros
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ativo', $ativo);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':cns', $cns);
        $stmt->bindParam(':nome_responsavel', $nome_responsavel);
        $stmt->bindParam(':nome_pai', $nome_pai);
        $stmt->bindParam(':ocupacao_pai', $ocupacao_pai);
        $stmt->bindParam(':nome_mae', $nome_mae);
        $stmt->bindParam(':ocupacao_mae', $ocupacao_mae);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':raca', $raca);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':queixa', $queixa);

        // Executar a query
        if ($stmt->execute()) {
            echo json_encode(['success' => 'Dados atualizados com sucesso!']);
        } else {
            echo json_encode(['error' => 'Erro ao atualizar os dados.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erro na consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Método de requisição inválido.']);
}
