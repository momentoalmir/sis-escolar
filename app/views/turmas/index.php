<table border="1">
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Ano</th>
        <th>Ações</th>
    </tr>
    <?php foreach($context['turmas'] as $turma): ?>
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
