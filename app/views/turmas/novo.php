<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Turma</title>
</head>
<body>
    <h1>Sistema Acadêmico</h1>
    <p>Nova Turma</p>

    <form action="/turmas" method="post">
        <p>
        <label for="descTurma">Descrição da Turma</label>
        <input type="text" name="descTurma" id="descTurma">
        </p>

        <p>
        <label for="ano">Ano</label>
        <input type="text" name="ano" id="ano">
        </p>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
