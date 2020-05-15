<?php


namespace App\ViewHelpers;


abstract class TodoViewHelper
{
    public static function displayCompleted(array $todos): string
    {
        $string = "";
        foreach ($todos as $todo){
            $string .= "<li>" . $todo['name']. "<input  type='checkbox' name='id[]' value='". $todo['id'] . "'></li>";

        }

        return $string;
    }

    public static function displayUnCompleted(array $todos): string
    {
        $string = "";
        foreach ($todos as $todo){
            $string .= "<li>" . $todo['name'] . "<input  type='checkbox' name='id[]' value='". $todo['id'] . "'></li>";

        }

        return $string;
    }

}