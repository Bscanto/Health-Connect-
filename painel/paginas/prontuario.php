
<?php

$pag = 'prontuario';

require_once("../conexao.php");
include 'prontuario/carregar_paciente.php';


?>

<a href="pacientes" type="button" class="btn btn-primary"><span class="fa fa-circle-chevron-left"></span> Voltar</a>

<br>
<br>

<!-- Traz campo dados paciente -->
<div class="container mt-5 bg-info text-white">
    <h2>Prontuário do Paciente</h2>
    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="aba1-tab" data-toggle="tab" href="#aba1" role="tab" aria-controls="aba1" aria-selected="true">Identificação Paciente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="aba2-tab" data-toggle="tab" href="#aba2" role="tab" aria-controls="aba2" aria-selected="false">Escolaridade</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="aba3-tab" data-toggle="tab" href="#aba3" role="tab" aria-controls="aba3" aria-selected="false">Anamnese</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="aba4-tab" data-toggle="tab" href="#aba4" role="tab" aria-controls="aba4" aria-selected="false">Dados Atendimento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="aba5-tab" data-toggle="tab" href="#aba5" role="tab" aria-controls="aba5" aria-selected="false">Ações realizadas</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="aba1" role="tabpanel" aria-labelledby="aba1-tab">

            <div class="conteudo-aba1">
                <div class="modal-body">
                    <div class="row mt-3">
                        <p><b>Prontuário Número:</b> <span id="prontuario_numero"><?php echo htmlspecialchars($id); ?></span></p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                           <h4><b>Informações Pessoais</b></h4>
                            <p><b>Nome:</b> <span id="nome_dados"><?php echo htmlspecialchars($nome); ?></span></p>
                            <p><b>Cns:</b> <span id="cns_dados"><?php echo htmlspecialchars($cns); ?></span></p>
                            <p><b>CPF:</b> <span id="cpf_dados"><?php echo htmlspecialchars($cpf); ?></span></p>
                            <p><b>Telefone:</b> <span id="telefone_dados"><?php echo htmlspecialchars($telefone); ?></span></p>
                            <p><b>Email:</b> <span id="email_dados"><?php echo htmlspecialchars($email); ?></span></p>
                            <p><b>Data de Nascimento:</b> <span id="data_nasc_dados"><?php echo htmlspecialchars($data_nasc); ?></span></p>
                            <p><b>Sexo:</b> <span id="sexo_dados"><?php echo htmlspecialchars($sexo); ?></span></p>
                            <p><b>Raça/Cor:</b> <span id="raca_dados"><?php echo htmlspecialchars($raca); ?></span></p>
                            <p><b>Nacionalidade:</b> <span id="nacionalidade_dados"><?php echo htmlspecialchars($nacionalidade); ?></span></p>
                        </div>

                        <div class="col-md-6">
                            <h4><b>Endereço</b></h4>
                            <p><b>Estado:</b> <span id="estado_dados"><?php echo htmlspecialchars($estado); ?></span></p>
                            <p><b>Cidade:</b> <span id="cidade_dados"><?php echo htmlspecialchars($cidade); ?></span></p>
                            <p><b>Bairro:</b> <span id="bairro_dados"><?php echo htmlspecialchars($bairro); ?></span></p>
                            <p><b>Endereço:</b> <span id="endereco_dados"><?php echo htmlspecialchars($endereco); ?></span></p>
                            <p><b>Cep:</b> <span id="cep_dados"><?php echo htmlspecialchars($cep); ?></span></p>
                            <p><b>Número:</b> <span id="numero_dados"><?php echo htmlspecialchars($numero); ?></span></p>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h4><b>Informações do Responsável</b></h4>
                            <p><b>Nome do Responsável:</b> <span id="nome_responsavel_dados"><?php echo htmlspecialchars($nome_responsavel); ?></span></p>
                            <p><b>Nome do Pai:</b> <span id="nome_pai_dados"><?php echo htmlspecialchars($nome_pai); ?></span></p>
                            <p><b>Ocupação do Pai:</b> <span id="ocupacao_pai_dados"><?php echo htmlspecialchars($ocupacao_pai); ?></span></p>
                            <p><b>Nome da Mãe:</b> <span id="nome_mae_dados"><?php echo htmlspecialchars($nome_mae); ?></span></p>
                            <p><b>Ocupação da Mãe:</b> <span id="ocupacao_mae_dados"><?php echo htmlspecialchars($ocupacao_mae); ?></span></p>
                        </div>

                        <div class="col-md-6">
                            <h4><b>Informações Adicionais</b></h4>
                            <p><b>Celular:</b> <span id="celular_dados"><?php echo htmlspecialchars($celular); ?></span></p>
                            <p><b>Ativo:</b> <span id="ativo_dados"><?php echo $ativo ? 'Sim' : 'Não'; ?></span></p>
                            <p><b>Queixa Principal:</b> <span id="queixa_dados"><?php echo htmlspecialchars($queixa); ?></span></p>
                        </div>
                    </div>
 
                    <div class="row mt-3">
                        <p><b>Data de Cadastro:</b> <span id="data_cad_dados"><?php echo htmlspecialchars($data_cad); ?></span></p>
                    </div>

										<a href="#" onclick="editar(<?php echo htmlspecialchars(json_encode([
    'id' => $id,
    'nome' => $nome,
    'cpf' => $cpf,
    'telefone' => $telefone,
    'email' => $email,
    'estado' => $estado,
    'cidade' => $cidade,
    'bairro' => $bairro,
    'endereco' => $endereco,
    'cep' => $cep,
    'numero' => $numero,
    'data_nasc' => $data_nasc,
    'sexo' => $sexo,
    'cns' => $cns,
    'nome_responsavel' => $nome_responsavel,
    'nome_pai' => $nome_pai,
    'ocupacao_pai' => $ocupacao_pai,
    'nome_mae' => $nome_mae,
    'ocupacao_mae' => $ocupacao_mae,
    'celular' => $celular,
    'raca' => $raca,
    'nacionalidade' => $nacionalidade,
    'queixa' => $queixa,
    'data_cad' => $data_cad
])) ?>)" title="Editar Dados" class="btn btn-primary">Editar</a>

                </div>
            </div>

        </div>
        <!-- Continue com as outras abas -->
        <div class="tab-pane fade" id="aba2" role="tabpanel" aria-labelledby="aba2-tab">
            <h3>Conteúdo da Aba 2</h3>
            <p>Este é o conteúdo da aba 2.</p>
        </div>
        <div class="tab-pane fade" id="aba3" role="tabpanel" aria-labelledby="aba3-tab">
            <h3>Conteúdo da Aba 3</h3>
            <p>Este é o conteúdo da aba 3.</p>
        </div>
        <div class="tab-pane fade" id="aba4" role="tabpanel" aria-labelledby="aba4-tab">
            <h3>Conteúdo da Aba 4</h3>
            <p>Este é o conteúdo da aba 4.</p>
        </div>
        <div class="tab-pane fade" id="aba5" role="tabpanel" aria-labelledby="aba5-tab">
            <h3>Conteúdo da Aba 5</h3>
            <p>Este é o conteúdo da aba 5.</p>
        </div>
    </div>
</div>



<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>