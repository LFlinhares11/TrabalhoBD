<?php 
include "conexao.php";

//verificar se os campos estão preenchidos e preencher o array alunos
if(isset($_POST['name']) && $_POST['name'] != ''){
    $alunos = array();

    $alunos['name'] = $_POST['name'];
}

if(isset($_POST['data_nasc']) && $_POST['data_nasc'] != ''){

    $alunos['data_nasc'] = $_POST['data_nasc'];
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

$lista_alunos = buscar_alunos($conexao);

function buscar_alunos($conexao){
    $sql_busca = 'SELECT * FROM alunos';
    $resultado = mysqli_query($conexao, $sql_busca);
    $alunos = array();

    while($aluno = mysqli_fetch_assoc($resultado)){
        $alunos[] = $aluno;
    }
    return $alunos;
}

?>