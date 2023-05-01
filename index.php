<?php

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_DATABASE', 'sis_escolar');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

require_once 'vendor/autoload.php';

use Utils\Router;
use Utils\Database;
use Utils\View;

$app = new App\App();
$router = $app->getRouter();

$router->get('/', function () {
    $db = Database::getDatabase();
    $context = $db->select('tb_turmas');
    View::render('home', $context);
});

$router->get('/turmas/novo', function () {
    View::render('turmas/novo');
});

$router->get('/turmas/editar', function () {
    $id = $_GET['id'];
    $db = Database::getDatabase();
    $context = [
        'turma' => $db->get('tb_turmas', ['id' => $id])
    ];
    View::render('turmas/editar', $context);
});

$router->put('/turmas', function () {
    $id = $_POST['id'];
    $descTurma = $_POST['descTurma'];
    $anoTurma = $_POST['ano'];

    $db = Database::getDatabase();
    $db->update('tb_turmas', [
        'descTurma' => $descTurma,
        'ano' => $anoTurma
    ], ['id' => $id]);

    Router::redirect('/');
});

$router->get('/turmas/excluir', function () {
    $id = $_GET['id'];

    $db = Database::getDatabase();
    $db->delete('tb_turmas', ['id' => $id]);

    Router::redirect('/');
});

$router->post('/turmas', function () {
    $descTurma = $_POST['descTurma'];
    $anoTurma = $_POST['ano'];

    $db = Database::getDatabase();
    $db->insert('tb_turmas', [
        'descTurma' => $descTurma,
        'ano' => $anoTurma
    ]);

    Router::redirect('/');
});

$router->resolve();
