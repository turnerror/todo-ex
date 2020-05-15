<?php


namespace App\Validators;


use App\Interfaces\ITodoValidator;

class TodoValidator implements ITodoValidator
{
    public function validateTodo(string $name): bool
    {
        $check = true;

        if (strlen($name) == 0) {
            $check = false;
        }

        return $check;
    }
}