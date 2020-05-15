<?php


namespace App\Factories;


use App\Models\TodoModel;
use Psr\Container\ContainerInterface;

class TodoModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('db');

        return new TodoModel($db->connect());
    }

}