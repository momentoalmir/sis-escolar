<h1>Disciplinas</h1>
<a href="/disciplinas/novo">Nova Disciplina</a>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Descrição</th>
      <th>Turma</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($disciplinas as $disciplina): ?>
      <tr>
        <td><?= $disciplina['id'] ?></td>
        <td><?= $disciplina['descDisciplina'] ?></td>
        <td><?= $disciplina['turma']['descTurma'] ?></td>
        <td>
          <a href="/disciplinas/editar?id=<?= $disciplina['id'] ?>">Editar</a>
          <form method="POST" action="/disciplinas" style="display: inline">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $disciplina['id'] ?>">
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir essa disciplina?')">Excluir</button>
          </form>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a href="/">Voltar</a>
