<h1>Editar Disciplina</h1>
<form method="POST" action="/disciplinas">
  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="id" value="<?= $disciplina['id'] ?>">
  <div>
    <label for="descDisciplina">Descrição:</label>
    <input type="text" name="descDisciplina" id="descDisciplina" required value="<?= $disciplina['descDisciplina'] ?>">
  </div>
  <button type="submit">Salvar</button>
</form>
<a href="/">Voltar</a>
