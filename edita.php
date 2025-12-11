<?php 
session_start();
include('menu.php');
include 'conexao.php';

if(isset($_POST['name']) && $_POST['name'] != ''){
    $alunos = array();

    $alunos['id'] = $_GET['id'];

    $alunos['name'] = $_POST['name'];


if(isset($_POST['data_nasc']) && $_POST['data_nasc'] != ''){

    $alunos['data_nasc'] = $_POST['data_nasc'];
}else{
    $alunos['data_nasc'] = "0000-00-00";
}

if(isset($_POST['cpf']) && $_POST['cpf'] != ''){

    $alunos['cpf'] = $_POST['cpf'];
}

if(isset($_POST['rua']) && $_POST['rua'] != ''){

    $alunos['rua'] = $_POST['rua'];
}

if(isset($_POST['cep']) && $_POST['cep'] != ''){

    $alunos['cep'] = $_POST['cep'];
}

if(isset($_POST['cidade']) && $_POST['cidade'] != ''){

    $alunos['cidade'] = $_POST['cidade'];
}

if(isset($_POST['bairro']) && $_POST['bairro'] != ''){

    $alunos['bairro'] = $_POST['bairro'];
}

if(isset($_POST['number']) && $_POST['number'] != ''){

    $alunos['number'] = $_POST['number'];
}

if(isset($_POST['name_resp']) && $_POST['name_resp'] != ''){

    $alunos['name_resp'] = $_POST['name_resp'];
}

if(isset($_POST['tipo_resp']) && $_POST['tipo_resp'] != ''){

    $alunos['tipo_resp'] = $_POST['tipo_resp'];
}

if(isset($_POST['curso']) && $_POST['curso'] != ''){

    $alunos['curso'] = $_POST['curso'];
}

edita_aluno($conexao, $alunos);
}

$alunos = busca_aluno($conexao, $_GET['id']);

function busca_aluno($conexao, $id){
    $sql_busca = "SELECT * FROM alunos where id = ". $id;
    $result = mysqli_query($conexao, $sql_busca);
    return mysqli_fetch_assoc($result);
}

function edita_aluno($conexao, $alunos){
    $sql_edita = "UPDATE alunos SET nome_aluno = '{$alunos['name']}', data_nasc = '{$alunos['data_nasc']}',
    cpf = '{$alunos['cpf']}', curso = '{$alunos['curso']}', name_resp = '{$alunos['name_resp']}', tipo_resp = '{$alunos['tipo_resp']}',
    rua = '{$alunos['rua']}', bairro = '{$alunos['bairro']}', cidade = '{$alunos['cidade']}', numero_casa = '{$alunos['number']}',
    cep = '{$alunos['cep']}' WHERE id = '{$alunos['id']}'";
    mysqli_query($conexao, $sql_edita);
    header('Location: listar_al.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register new element</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
</head>
<body>
    <section class="h-100 mt-3">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="card shadow-lg">
                        <div class="card-body p-3">
                            <h1 class="fs-4 card-tittle fw-bold mb-1">Update Element</h1>
                        
                        <form action="" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                          
                        <!--Mensagem de cadastro inicio-->
							<?php 
								if(isset($_SESSION['mensagem'])):
							?>
							<div class="alert alert-info alert-dismissible fade show" role="alert">
								<?= $_SESSION['mensagem']; ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							<?php 
								unset($_SESSION['mensagem']); //limpa a msg após exibir
								endif;
							?>
							<!--Mensagem de cadastro final-->
                        <!--Campo Nome-->
							<div class="mb-3">
								<label class="mb-2" for="nome" class="form-label">Nome</label>
								<input id="name" type="text" class="form-control" name="name" value="<?php echo $alunos['nome_aluno']?>" required>
							</div>
							<div class="row">
								<!--Campo Data Nascimento-->
								<div class="col-md-6 mb-3">
									<label for="data_nasc" class="form-label">Data de Nascimento</label>
									<input type="date" class="form-control" id="data" name="data_nasc" value="<?php echo $alunos['data_nasc']?>" required>
								</div>
								<div class="col-md-6 mb-3">
									<label for="cpf" class="form-label">CPF</label>
									<input type="text" class="form-control" name="cpf"  value="<?php echo $alunos['cpf']?>">
								</div>
							</div>

							<h2 class="fs-4 card-title fw-bold mb-4">Endereço</h2>
							<div class="row">
								<!--Campo Rua-->
								<div class="col-md-4 mb-3">
									<label for="rua" class="form-label">Rua</label>
									<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua D.Pedro II..." value="<?php echo $alunos['rua']?>" required>
								</div>
								<!--Campo Numero-->
								<div class="col-md-4 mb-3">
									<label for="numero" class="form-label">N°</label>
									<input type="text" class="form-control" id="numero" name="number" value="<?php echo $alunos['numero_casa']?>" required>
								</div>
								<!--Campo Bairro-->
								<div class="col-md-4 mb-3">
									<label for="bairro" class="form-label">Bairro</label>
									<input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $alunos['bairro']?>" required>
								</div>
							</div>
							
							<div class="row">
								<!--Campo CEP-->
								<div class="col-md-6 mb-3">
									<label for="cep" class="form-label">CEP</label>
									<input type="text" class="form-control" id="cep" name="cep" value="<?php echo $alunos['cep']?>" required>
								</div>
								<div class="col-md-6 mb-3">
									<label for="cidade" class="form-label">Cidade</label>
									<input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $alunos['cidade']?>" required>
								</div>
							</div>

							<h2 class="fs-4 card-title fw-bold mb-4">Responsável</h2>
							<div class="row">
								<!--Selecionar tipo de responsavel-->
								<div class="col-md-4 mb-3">
									<label for="tipoResponsavel" class="form-label">Tipo</label>
									<select class="form-select" id="tipoResponsavel" name="tipo_resp" value="<?php echo $alunos['tipo_resp']?>" required>
										<option selected>Selecione</option>
										<option value="Pai">Pai</option>
										<option value="Mãe">Mãe</option>
										<option value="5">Outro</option>
									</select>
								</div>
								<!--Nome Responsavel-->
								<div class="col-md-8 mb-3">
									<label for="nomeResponsavel" class="form-label">Nome Responsável</label>
									<input type="text" class="form-control" id="nomeResponsavel" name="name_resp" value="<?php echo $alunos['name_resp']?>" required>
								</div>
							</div>

							<div class="mb-3">
								<label for="curso" class="form-label">Curso</label>
								<select name="curso" id="" class="form-select"  value="<?php echo $alunos['curso']?>">
									<option selected>Selecione</option>
									<option value="Enfermagem">Enfermagem</option>
									<option value="Informática">Informática</option>
									<option value="ADS">ADS</option>
									<option value="Administração">Administração</option>
								</select>
							</div>
							<!--Botao cadastrar-->
							<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">Register</button>
							</div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>



    </section>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>