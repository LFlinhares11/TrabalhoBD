<?php
include "conexao.php";
include 'menu.php';

/* -------------------------------------------------
   DADOS PARA OS CARDS (NÚMEROS DE RESUMO)
--------------------------------------------------*/

// Total de alunos
$sql_total = $conexao->query("SELECT COUNT(*) AS total FROM alunos");
$total_alunos = $sql_total->fetch_assoc()['total'];

// Total de cursos
$sql_cursos = $conexao->query("SELECT COUNT(DISTINCT curso) AS total FROM alunos");
$total_cursos = $sql_cursos->fetch_assoc()['total'];

// Alunos fora de Crateús
$sql_fora = $conexao->query("
    SELECT COUNT(*) AS total 
    FROM alunos 
    WHERE LOWER(cidade) <> 'crateús' 
    AND LOWER(cidade) <> 'crateus'
");
$fora_crateus = $sql_fora->fetch_assoc()['total'];

// Média de alunos por curso
$media_alunos = $total_cursos > 0 ? round($total_alunos / $total_cursos, 1) : 0;

// Tipos de Responsável Únicos
$sql_resp = $conexao->query("
    SELECT tipo_resp, COUNT(*) AS total 
    FROM alunos 
    GROUP BY tipo_resp
");
$total_responsaveis = $sql_resp->num_rows;

// Total de alunos no curso de Informática
$sql_info = $conexao->query("
    SELECT COUNT(*) AS total 
    FROM alunos 
    WHERE curso = 'Informática'
");
$total_informatica = $sql_info->fetch_assoc()['total'];

/* -------------------------------------------------
   DADOS PARA OS GRÁFICOS (Preparação para Google Charts)
   USANDO O MÉTODO LIMPO DE JSON_ENCODE
--------------------------------------------------*/

// --- 1. Gráfico: Alunos por Bairro (Column Chart) ---
$sqlBairro = "SELECT bairro, COUNT(*) as total FROM alunos GROUP BY bairro";
$resultBairro = mysqli_query($conexao, $sqlBairro);

$dadosBairro = [];
while ($row = mysqli_fetch_assoc($resultBairro)) {
    // [ 'Nome do Bairro', Quantidade ]
    $dadosBairro[] = [$row['bairro'], (int)$row['total']];
}

// Array final com o cabeçalho para o JSON_ENCODE
$dadosGraficoBairro = [['Bairro', 'Quantidade']];
foreach ($dadosBairro as $d) {
    $dadosGraficoBairro[] = $d;
}


// --- 2. Gráfico: Tipo de Responsável (Pie Chart) ---
$sqlResp = "SELECT tipo_resp, COUNT(*) as total FROM alunos GROUP BY tipo_resp";
$resultResp = mysqli_query($conexao, $sqlResp);

$dadosResp = [];
while ($row = mysqli_fetch_assoc($resultResp)) {
    // [ 'Tipo de Responsável', Quantidade ]
    $dadosResp[] = [$row['tipo_resp'], (int)$row['total']];
}

// Array final com o cabeçalho para o JSON_ENCODE
$dadosGraficoResp = [['Responsável', 'Quantidade']];
foreach ($dadosResp as $d) {
    $dadosGraficoResp[] = $d;
}

?>

<script src="https://www.gstatic.com/charts/loader.js"></script>

<style>
    .graficos {
      display: flex;
      gap: 30px;
      flex-wrap: wrap;
    }

    .grafico {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
</style>

<script>
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(desenharGraficos);

    function desenharGraficos() {

      // ===== Gráfico BARRAS - Alunos por Bairro =====
      const dadosBairro = google.visualization.arrayToDataTable(
        // Imprime o array PHP formatado com o cabeçalho
        <?php echo json_encode($dadosGraficoBairro, JSON_NUMERIC_CHECK); ?>
      );

      const graficoBairro = new google.visualization.ColumnChart(
        document.getElementById("graficoBairro")
      );
      graficoBairro.draw(dadosBairro, { title: "Alunos por Bairro" });


      // ===== Gráfico PIZZA - Tipo de Responsável =====
      const dadosResp = google.visualization.arrayToDataTable(
        // Imprime o array PHP formatado com o cabeçalho
        <?php echo json_encode($dadosGraficoResp, JSON_NUMERIC_CHECK); ?>
      );

      const graficoResp = new google.visualization.PieChart(
        document.getElementById("graficoResponsavel")
      );
      graficoResp.draw(dadosResp, { title: "Tipo de Responsável" });
    }
</script>