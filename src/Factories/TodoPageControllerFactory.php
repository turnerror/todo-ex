<?php


namespace App\Factories;


use App\Controllers\ToDoPageController;
use Psr\Container\ContainerInterface;

class TodoPageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('TodoModel');
        $renderer = $container->get('renderer');

        return new ToDoPageController($todoModel, $renderer);
    }


}