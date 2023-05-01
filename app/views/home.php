<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>

</head>
<body>
    <h1>Sistema Acadêmico</h1>

    <p>
        Adicionar uma nova turma: <a href="/turmas/novo">Clique aqui</a>
    </p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
        <?php foreach($context as $turma): ?>
        <tr>
            <td><?= $turma['id'] ?></td>
            <td><?= $turma['descTurma'] ?></td>
            <td><?= $turma['ano'] ?></td>
            <td>
                <a href="/turmas/editar?id=<?= $turma['id'] ?>">Editar</a>
                <a href="/turmas/excluir?id=<?= $turma['id'] ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
