<?php
if (@$home == 'ocultar') {
    echo "<script>window.location='../index.php'</script>";
    exit();
}

// Definindo as metas de atendimentos
$meta_diaria = 30;
$meta_mensal = 100;
$meta_anual = 1000;

// Defina valores padrão para evitar erros de variáveis indefinidas
$total_acoes_hoje = $total_acoes_hoje ?? 0;
$total_atendimentos_mes = $total_atendimentos_mes ?? 0;
$total_atendimentos_ano = $total_atendimentos_ano ?? 0;

$percentual_hoje = ($total_acoes_hoje / $meta_diaria) * 100;
$percentual_mes = ($total_atendimentos_mes / $meta_mensal) * 100;
$percentual_ano = ($total_atendimentos_ano / $meta_anual) * 100;

// Consulta SQL para obter os atendimentos por profissional no mês atual
$atendimentos_por_profissional = $pdo->query("
    SELECT u.id AS profissional_id, u.nome, COUNT(ar.id_acao_realizada) AS total_atendimentos
    FROM usuarios u
    JOIN acao_realizada ar ON u.id = ar.fk_usuarios_id
    WHERE MONTH(ar.data_acao) = MONTH(CURDATE()) 
      AND YEAR(ar.data_acao) = YEAR(CURDATE())
    GROUP BY u.id, u.nome
")->fetchAll(PDO::FETCH_ASSOC);

$profissionais = [];
$totalAtendimentos = [];

foreach ($atendimentos_por_profissional as $atendimento) {
    $profissionais[] = $atendimento['nome']; // Corrigido para acessar o campo 'nome'
    $totalAtendimentos[] = $atendimento['total_atendimentos'];
}
?>

<div class="main-page margin-mobile">
    <!-- CARDS PEQUENOS -->
    <div class="col_3">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-user icon-rounded"></i>
                <div class="stats">
                    <span>Total de Pacientes</span>
                    <h5><strong><?php echo $total_paciente; ?></strong></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-user-md user1 icon-rounded"></i>
                <div class="stats">
                    <span>Total de Profissionais</span>
                    <h5><strong><?php echo $total_profissional; ?></strong></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-stethoscope user2 icon-rounded"></i>
                <div class="stats">
                    <span>Total de Ações Realizadas</span>
                    <h5><strong><?= $total_acao; ?></strong></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-heartbeat dollar1 icon-rounded"></i>
                <div class="stats">
                    <span>Total de Anamnese</span>
                    <h5><strong><?= $total_anamnese; ?></strong></h5>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="card text-center">
                <div class="card-header">Data e Hora Atual</div>
                <div class="card-body">
                    <h5 class="card-title" id="currentDateTime"></h5>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- Gráfico de Atendimentos por Profissional -->
    <div class="row-one widgettable">
        <div class="col-md-8 content-top-2 card">
            <div class="agileinfo-cdr altura_grafico">
                <div class="card-header">
                    <h3>Atendimentos por Profissional no Mês</h3>
                </div>
                <canvas id="barChart" style="width: 98%; height: 350px;"></canvas>
            </div>
        </div>

        <!-- Atualizações do Total de Atendimentos -->
        <div class="col-md-4 stat">
            <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Atendimentos Dia</h5>
                    <label><?= $total_acoes_hoje ?></label>
                </div>
                <div class="col-md-6 top-content1">
                    <div id="demo-pie-1" class="pie-title-center" data-percent="<?= min($percentual_hoje, 100) ?>">
                        <span class="pie-value"><?= round(min($percentual_hoje, 100)) ?>%</span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Atendimentos Mês</h5>
                    <label><?= $total_atendimentos_mes ?></label>
                </div>
                <div class="col-md-6 top-content1">
                    <div id="demo-pie-2" class="pie-title-center" data-percent="<?= min($percentual_mes, 100) ?>">
                        <span class="pie-value"><?= round(min($percentual_mes, 100)) ?>%</span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="content-top-1">
                <div class="col-md-6 top-content">
                    <h5>Total de Atendimentos Ano</h5>
                    <label><?= $total_atendimentos_ano ?></label>
                </div>
                <div class="col-md-6 top-content1">
                    <div id="demo-pie-3" class="pie-title-center" data-percent="<?= min($percentual_ano, 100) ?>">
                        <span class="pie-value"><?= round(min($percentual_ano, 100)) ?>%</span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Importando Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script para o Gráfico de Atendimentos por Profissional -->
<script>
    // Passando os dados PHP para variáveis JavaScript
    const profissionais = <?php echo json_encode($profissionais); ?>;
    const totalAtendimentos = <?php echo json_encode($totalAtendimentos); ?>;

    // Configuração do gráfico
    const ctx = document.getElementById('barChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: profissionais,
            datasets: [{
                label: 'Atendimentos',
                data: totalAtendimentos,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total de Atendimentos'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Profissionais'
                    }
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Atendimentos Realizados por Cada Profissional no Mês Atual'
                }
            }
        }
    });
</script>

<!-- Script para atualizar a Data e Hora Atual -->
<script>
    function updateDateTime() {
        const now = new Date();
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        };
        document.getElementById('currentDateTime').innerText = now.toLocaleString('pt-BR', options);
    }

    // Atualiza a data e hora a cada segundo
    setInterval(updateDateTime, 1000);
    updateDateTime(); // Chama a função para exibir a data e hora imediatamente
</script>
