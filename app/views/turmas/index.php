<h2>Turmas</h2>

<h3>Nova Turma</h3>
<?php require_once 'novo.php' ?>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Descrição</th>
      <th>Ano</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($context['turmas'] as $turma): ?>
    <tr>
      <td><?= $turma['id'] ?></td>
      <td><?= $turma['descTurma'] ?></td>
      <td><?= $turma['ano'] ?></td>
      <td>
        <a href="/turmas/editar?id=<?= $turma['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
        <form action="/turmas/excluir" method="POST" style="display: inline">
          <input type="hidden" name="id" value="<?= $turma['id'] ?>">
          <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<br>
