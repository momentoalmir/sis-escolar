
<h1>Sistema Acadêmico</h1>
<p>Editar Turma</p>

<form action="/turmas" method="put">
    <p>
    <label for="descTurma">Descrição da Turma</label>
    <input type="text" name="descTurma" id="descTurma" value="<?= $context['turma']['descTurma'] ?>">
    </p>

    <p>
    <label for="ano">Ano</label>
    <input type="text" name="ano" id="ano" value="<?= $context['turma']['ano'] ?>">
    </p>

    <button type="submit">Salvar</button>
</form>
