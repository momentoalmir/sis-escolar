<?php

require_once 'vendor/autoload.php';

use Utils\Router;
use Utils\View;

use App\Models\Turma;

$app = new App\App();
$router = $app->getRouter();

$router->get('/', function () {
    $turma = new Turma();
    $context = [
        'turmas' => $turma->all()
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
    $turma->save([
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

$router->resolve();
