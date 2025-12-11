<?php
session_start();
include('verifica_login.php');
include('graficos.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Muhamad Nauval Azhar">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="This is a login page template based on Bootstrap 5">
  <title>Bootstrap 5 Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <div class="container ">
    <h1 class="justify-content-center">
      DashBoard
    </h1>
    <section>
      <div class="row mt-3">
        <!-- CARD 3 -->
        <div class="col-lg-4 col-md-4 mb-4">
          <div class="card shadow-lg">
            <div class="card-body p-4 text-center">
              <h5 class="card-title text-primary">Média de Alunos por Curso</h5>
              <hr>
              <p class="display-5 fw-bold">
                <!---Exibe o total de registros-->
                <?php echo $media_alunos; ?>
              </p>
            </div>
          </div>
        </div>
        <!-- CARD 4 -->
        <div class="col-lg-4 col-md-4 mb-4">
          <div class="card shadow-lg">
            <div class="card-body p-4 text-center">
              <h5 class="card-title text-primary">Alunos Fora de Crateús</h5>
              <hr>
              <p class="display-5 fw-bold">
                <!---Exibe o total de alunos fora de Crateus-->
                <?php echo $fora_crateus; ?>
              </p>
            </div>
          </div>
        </div>
        <!-- CARD 5 -->
        <div class="col-lg-4 col-md-4 mb-4">
          <div class="card shadow-lg">
            <div class="card-body p-4 text-center">
              <h5 class="card-title text-primary">Tipos de responsaveis</h5>
              <hr>
              <p class="display-5 fw-bold">
                <!---Exibe o total os tipos de responsaveis-->
                <?php echo $total_responsaveis; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- CARD 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-lg">
            <div class="card-body p-4 text-center">
              <h5 class="card-title text-primary">Total de Candidatos</h5>
              <hr>
              <p class="display-5 fw-bold">
                <!---Exibe o total de Alunos-->
                <?php echo $total_alunos; ?>
              </p>
            </div>
          </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-lg">
            <div class="card-body p-4 text-center">
              <h5 class="card-title text-primary">Total de Cursos</h5>
              <hr>
              <p class="display-5 fw-bold">
                <!---Exibe o total de cursos-->
                <?php echo $total_cursos; ?>
              </p>
            </div>
          </div>
        </div>
        <!--Card 6--->
        <div class="col-lg-4 col-md-4 mb-4">
          <div class="card shadow-lg">
            <div class="card-body p-4 text-center">
              <h5 class="card-title text-primary">Curso de Informática</h6>
              <hr>
              <p class="display-5 fw-bold"><?php echo $total_informatica; ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="area-graficos">
      <div class="graficos" style="justify-content:center; display: flex; gap: 30px; flex-wrap: wrap;">
        <div id="graficoBairro" class="grafico" style="width: 500px; height: 400px;"></div>
        <div id="graficoResponsavel" class="grafico" style="width: 500px; height: 400px;"></div>
      </div>
    </section>
  </div>
</body>

</html>