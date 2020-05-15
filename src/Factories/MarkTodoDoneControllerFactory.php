<?php


namespace App\Factories;


use App\Controllers\MarkTodoDoneController;
use Psr\Container\ContainerInterface;

class MarkTodoDoneControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $todoModel = $container->get('TodoModel');

        return new MarkTodoDoneController($todoModel);
    }

}