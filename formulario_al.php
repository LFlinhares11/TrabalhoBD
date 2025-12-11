<?php
session_start();
include 'conexao.php';
include 'helper.php';

//verificar se os campos estão vazios:
if (empty($_POST['name']) || empty($_POST['data_nasc'])  || empty($_POST['cpf']) || empty($_POST['cep']) || empty($_POST['rua']) || empty($_POST['cidade']) || empty($_POST['bairro']) || empty($_POST['number']) || empty($_POST['name_resp']) || empty($_POST['tipo_resp']) || empty($_POST['curso'])) {
    $_SESSION['mensagem'] = "Preencha todos os campos!";
    header('Location: cadastro_aluno.php');
    exit();
}


//sanititzar os dados para evitar ataques com SQL EJECTION:
$nome_aluno = mysqli_escape_string($conexao, trim($_POST['name']));
$data_nasc = mysqli_escape_string($conexao, trim($_POST['data_nasc']));
$cpf = mysqli_escape_string($conexao, trim($_POST['cpf']));
$cep = mysqli_escape_string($conexao, trim($_POST['cep']));
$rua = mysqli_escape_string($conexao, trim($_POST['rua']));
$cidade = mysqli_escape_string($conexao, trim($_POST['cidade']));
$bairro = mysqli_escape_string($conexao, trim($_POST['bairro']));
$numero_casa = mysqli_escape_string($conexao, trim($_POST['number']));
$nome_resp = mysqli_escape_string($conexao, trim($_POST['name_resp']));
$tipo_resp = mysqli_escape_string($conexao, trim($_POST['tipo_resp']));
$curso = mysqli_escape_string($conexao, trim($_POST['curso']));


//formatação de variáveis:
$cpf = preg_replace('/\D/', '', $cpf);
if (strlen($cpf) != 11 || !is_numeric($cpf)) {
    $_SESSION['mensagem'] = "O CPF precisa ser numérico e com 11 dígitos.";
    header('Location: cadastro_aluno.php');
    exit();
}

if (is_numeric($nome_aluno) || is_numeric($nome_resp)) {
    $_SESSION['mensagem'] = "Os campos Nome e Nome do Responsável não podem conter números.";
    header('Location: cadastro_aluno.php');
    exit();
}

if (!is_numeric($cep) || !is_numeric($numero_casa)) {
    $_SESSION['mensagem'] = "Os campos CEP e Número só devem conter números.";
    header('Location: cadastro_aluno.php');
    exit();
}

if (strlen($cep) != 8) {
    $_SESSION['mensagem'] = "O campo CEP deve conter 8 dígitos.";
    header('Location: cadastro_aluno.php');
    exit();
}


//inserir um novo usuario:
$sql_inserir = "INSERT INTO alunos(nome_aluno, data_nasc, cpf, curso, name_resp, tipo_resp, rua, bairro, cidade, numero_casa, cep)
     VALUES('$nome_aluno', '$data_nasc', '$cpf', '$curso', '$nome_resp', '$tipo_resp', '$rua', '$bairro', '$cidade', '$numero_casa', '$cep')";

//verificar se a conexão deu certo:
if (mysqli_query($conexao, $sql_inserir)) {
    $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
    header('Location: listar_al.php');
    exit();
} else {
    $_SESSION['mensagem'] = "Erro ao cadastrar novo usuário." . mysqli_error($conexao);
    header('Location: cadastro_aluno.php');
    exit();
}
