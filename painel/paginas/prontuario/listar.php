<?php
require_once("../../../conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id']; // ID do paciente passado na URL

    // Query para buscar o paciente e suas ações realizadas
    $query = $pdo->prepare("SELECT 
            paciente.id AS paciente_id, 
            paciente.nome, 
            acao_realizada.quantidade, 
            acao_realizada.servico, 
            acao_realizada.data_acao, 
            acao_realizada.classificacao, 
            acao_realizada.cbo, 
            acao_realizada.cnsp, 
            acao_realizada.local_acao, 
            acao_realizada.descricao_procedimento, 
            acao.descricao AS descricao_acao
        FROM 
            paciente
        JOIN 
            acao_realizada ON paciente.id = acao_realizada.fk_paciente_id
        JOIN 
            acao ON acao_realizada.fk_acao_id = acao.id
        WHERE 
            paciente.id = :id
    ");
    
    $query->bindValue(':id', $id);
    $query->execute();
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $linhas = @count($res);

    if ($linhas > 0) {
        echo <<<HTML
        <small>
            <table class="table table-hover" id="tabela">
            <thead> 
            <tr> 
            <th>Nome do Paciente</th>
            <th>Serviço</th>
            <th>Data da Ação</th> 
            <th>Classificação</th> 
            <th>CBO</th>
            <th>CNSP</th>
            <th>Local da Ação</th>
            <th>Descrição do Procedimento</th>
            </tr> 
            </thead> 
            <tbody>    
HTML;

        // Itera pelos resultados e preenche as linhas da tabela
        foreach ($acoes as $acao_realizada) {
            $nome = $acao['nome'];
            $servico = $acao['servico'];
            $data_acao = implode('/', array_reverse(explode('-', $acao['data_acao'])));
            $classificacao = $acao['classificacao'];
            $cbo = $acao['cbo'];
            $cnsp = $acao['cnsp'];
            $local_acao = $acao['local_acao'];
            $descricao_procedimento = $acao['descricao_procedimento'];

            echo <<<HTML
            <tr>
                <td>{$nome}</td>
                <td>{$servico}</td>
                <td>{$data_acao}</td>
                <td>{$classificacao}</td>
                <td>{$cbo}</td>
                <td>{$cnsp}</td>
                <td>{$local_acao}</td>
                <td>{$descricao_procedimento}</td>
            </tr>
HTML;
        }

        echo <<<HTML
        </tbody>
        </table>
        </small>
HTML;
    } else {
        echo '<small>Nenhuma ação realizada encontrada para este paciente!</small>';
    }
} else {
    echo '<small>ID do paciente não fornecido!</small>';
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tabela').DataTable({
            "language": {
                //"url": '//cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
            },
            "ordering": false,
            "stateSave": true
        });
    });
</script>
