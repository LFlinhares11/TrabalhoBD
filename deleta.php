<?php 
include 'conexao.php';

remover_aluno($conexao, $_GET['id']);

function remover_aluno($conexao, $id){
    $sql_deleta = "DELETE FROM alunos where id = {$id}";
    mysqli_query($conexao, $sql_deleta);
}

header('Location: listar_al.php');


?>