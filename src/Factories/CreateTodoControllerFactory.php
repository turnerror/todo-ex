<?php


namespace App\Factories;


use App\Controllers\CreateTodoController;
use Psr\Container\ContainerInterface;

class CreateTodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('TodoModel');
        $validator = $container->get('TodoValidator');

        return new CreateTodoController($validator, $todoModel);
    }


}