<?php


namespace App\Factories;


use App\Controllers\DeleteTodosController;
use Psr\Container\ContainerInterface;

class DeleteTodosControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('TodoModel');

        return new DeleteTodosController($todoModel);
    }

}