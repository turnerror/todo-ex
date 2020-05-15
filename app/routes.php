<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();


    $app->get('/' , 'TodoPageController');

    $app->post('/add' , 'CreateTodoController');

    $app->post('/markDone' , 'MarkTodoDoneController');

    $app->post('/delete' , 'DeleteTodosController');

};
