<h1>Disciplinas</h1>

<h3>Nova disciplina</h3>
<?php require_once 'novo.php' ?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Turma</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($disciplinas as $disciplina) : ?>
            <tr>
                <td><?= $disciplina['id'] ?></td>
                <td><?= $disciplina['descDisciplina'] ?></td>
                <td><?= $disciplina['turma']['descTurma'] ?></td>
                <td>
                    <a href="/disciplinas/editar?id=<?= $disciplina['id'] ?>" class="btn btn-primary">Editar</a>
                    <form method="GET" action="/disciplinas/excluir" style="display: inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $disciplina['id'] ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa disciplina?')">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
