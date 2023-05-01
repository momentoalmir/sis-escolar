<h1 class="h1">Editar Disciplina</h1>
<form class="form" method="POST" action="/disciplinas">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?= $disciplina['id'] ?>">
    <div class="form-group">
        <label for="descDisciplina" class="form-label">Descrição:</label>
        <input type="text" class="form-control" name="descDisciplina" id="descDisciplina" required value="<?= $disciplina['descDisciplina'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<br>
<p>
    <a href="/" class="btn btn-secondary">Voltar</a>
</p>
