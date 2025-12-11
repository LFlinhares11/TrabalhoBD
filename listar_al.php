<?php
include 'menu.php';
include 'lista.php';
include 'helper.php';
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
    <header>
        <h1>Lista dos Alunos Cadastrados:</h1>
    </header>

    <div class="container mt-5 rounded-2 shadow p-3">
        <div class="table table-responsive">
            <table class="table table-columns">
                <thead class="table-success">
                    <tr>
                        <th>Nome do Aluno</th>
                        <th>Data de Nascimento</th>
                        <th>CPF</th>
                        <th>Curso</th>
                        <th>Nome do Responsável</th>
                        <th>Parentalidade</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>CEP</th>
                        <th>Número da Casa</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_alunos as $alunos) : ?>
                        <tr>
                            <td><?php echo $alunos['nome_aluno']; ?></td>
                            <td><?php echo traduz_data_exibir($alunos['data_nasc']); ?></td>
                            <td><?php echo $alunos['cpf']; ?></td>
                            <td><?php echo ($alunos['curso']); ?></td>
                            <td><?php echo $alunos['name_resp']; ?></td>
                            <td><?php echo ($alunos['tipo_resp']); ?></td>
                            <td><?php echo $alunos['rua']; ?></td>
                            <td><?php echo $alunos['bairro']; ?></td>
                            <td><?php echo $alunos['cidade']; ?></td>
                            <td><?php echo $alunos['cep']; ?></td>
                            <td><?php echo $alunos['numero_casa']; ?></td>
                            <td>
                                <a type="button" class="btn btn-primary mb-3 " href="edita.php?id=<?php echo $alunos['id']; ?>">Editar</a>
                                <a type="button" class="btn btn-danger " href="deleta.php?id=<?php echo $alunos['id']; ?>">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
    
            </table>
        </div>

    </div>
</body>

</html>