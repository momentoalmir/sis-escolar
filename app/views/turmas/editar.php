
<h1>Sistema Acadêmico</h1>
<p>Editar Turma</p>

<form class="form" action="/turmas" method="put">
    <div class="form-group">
        <label for="descTurma">Descrição da Turma</label>
        <input type="text" class="form-control" name="descTurma" id="descTurma" value="<?= $context['turma']['descTurma'] ?>">
    </div>

    <div class="form-group">
        <label for="ano">Ano</label>
        <input type="text" class="form-control" name="ano" id="ano" value="<?= $context['turma']['ano'] ?>">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<p>
    <a href="/" class="btn btn-secondary">Voltar</a>
</p>
