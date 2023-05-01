<form method="POST" action="/disciplinas">
    <div class="form-group">
        <label for="descDisciplina">Descrição:</label>
        <input type="text" name="descDisciplina" id="descDisciplina" required class="form-control">
    </div>

    <div class="form-group">
        <label for="turma">Turma:</label>
        <select name="turma" id="turma" class="form-control">
            <?php foreach ($context['turmas'] as $turma) : ?>
                <option value="<?= $turma['id'] ?>" name="turma"><?= $turma['descTurma'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<br>
