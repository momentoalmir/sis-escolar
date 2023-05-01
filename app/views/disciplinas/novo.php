<h1>Nova Disciplina</h1>
<form method="POST" action="/disciplinas">
  <div>
    <label for="descDisciplina">Descrição:</label>
    <input type="text" name="descDisciplina" id="descDisciplina" required>
  </div>

  <div>
    <label for="turma">Turma:</label>
    <select name="turma" id="turma">
      <?php foreach ($context['turmas'] as $turma): ?>
        <option value="<?= $turma['id'] ?>" name="turma"><?= $turma['descTurma'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <button type="submit">Salvar</button>
</form>

<a href="/">Voltar</a>
