<?php

require_once 'vendor/autoload.php';

use App\Models\Disciplina;
use Utils\Router;
use Utils\View;

use App\Models\Turma;

$app = new App\App();
$router = $app->getRouter();

$db = new Utils\Database();
$db->migrate();

$router->get('/', function () {
    $turma = new Turma();
    $disciplina = new Disciplina();
    $context = [
        'turmas' => $turma->all(),
        'disciplinas' => $disciplina->all()
    ];
    View::render('home', $context);
});

$router->get('/turmas/novo', function () {
    View::render('turmas/novo');
});

$router->get('/turmas/editar', function () {
    $id = $_GET['id'];
    $turma = new Turma();
    $context = [
        'turma' => $turma->find($id)
    ];
    View::render('turmas/editar', $context);
});

$router->put('/turmas', function () {
    $id = $_POST['id'];
    $descTurma = $_POST['descTurma'];
    $anoTurma = $_POST['ano'];

    $turma = new Turma();
    $turma->update([
        'descTurma' => $descTurma,
        'ano' => $anoTurma
    ], ['id' => $id]);

    Router::redirect('/');
});

$router->get('/turmas/excluir', function () {
    $id = $_GET['id'];

    $turma = new Turma();
    $turma->delete(['id' => $id]);

    Router::redirect('/');
});

$router->post('/turmas', function () {
    $descTurma = $_POST['descTurma'];
    $anoTurma = $_POST['ano'];

    $turma = new Turma();
    $turma->create([
        'descTurma' => $descTurma,
        'ano' => $anoTurma
    ]);

    Router::redirect('/');
});

$router->get('/disciplinas', function () {
    $disciplina = new Disciplina();
    // Adiciona turma na disciplina
    $context = [
        'disciplinas' => $disciplina->all()
    ];

    View::render('disciplinas/index', $context);
});

$router->get('/disciplinas/novo', function () {
    $context = [
        'turmas' => (new Turma())->all() ?? []
    ];
    View::render('disciplinas/novo', $context);
});

$router->get('/disciplinas/editar', function () {
    $id = $_GET['id'];
    $disciplina = new Disciplina();
    $context = [
        'disciplina' => $disciplina->find($id)
    ];
    View::render('disciplinas/editar', $context);
});

$router->put('/disciplinas', function () {
    $id = $_POST['id'];
    $descDisciplina = $_POST['descDisciplina'];

    $disciplina = new Disciplina();
    $disciplina->update([
        'descDisciplina' => $descDisciplina
    ], ['id' => $id]);

    Router::redirect('/disciplinas');
});

$router->get('/disciplinas/excluir', function () {
    $id = $_GET['id'];

    $disciplina = new Disciplina();
    $disciplina->delete(['id' => $id]);

    Router::redirect('/disciplinas');
});

$router->post('/disciplinas', function () {
    $descDisciplina = $_POST['descDisciplina'];
    $idTurma = $_POST['turma'];

    $disciplina = new Disciplina();
    $disciplina->create([
        'descDisciplina' => $descDisciplina,
        'idTurma' => intval($idTurma)
    ]);

    Router::redirect('/disciplinas');
});


$router->resolve();
