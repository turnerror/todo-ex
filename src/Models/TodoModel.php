<?php


namespace App\Models;



use App\Interfaces\ITodoModel;

class ToDoModel implements ITodoModel
{
    private $db;

    /**
     * ToDoModel constructor.
     * @param $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCompletedToDos(): array
    {
        $query = $this->db->query("SELECT `id`, `name` FROM `todos` WHERE `isDeleted` = 0 AND `isDone` = '1';");
        $completed = $query->fetchAll();
        return $completed;
    }

    public function getUnCompletedToDos(): array
    {
        $query = $this->db->query("SELECT `id`, `name` FROM `todos` WHERE `isDeleted` = 0 AND `isDone` = '0';");
        $uncompleted = $query->fetchAll();
        return $uncompleted;
    }

    public function createTodo(string $name): bool
    {
        $query = $this->db->prepare("INSERT INTO `todos` (`name`) VALUES (:name)");
        $query->bindParam(':name', $name);

        return $query->execute();
    }

    public function markTodosDone(array $todosToMarkDone): bool
    {
        //The following below to avoid SQL injection while allowing $todosToMarkDone to be any size.
        $in  = str_repeat('?,', count($todosToMarkDone) - 1) . '?';
        $stmt = "UPDATE `todos` SET `isDone` = '1' WHERE `id` in ($in)";
        $query = $this->db->prepare($stmt);

        return $query->execute($todosToMarkDone);
    }

    public function softDeleteTodos(array $todosToDelete): bool
    {
        //The following below to avoid SQL injection while allowing $todosToMarkDone to be any size.
        $in  = str_repeat('?,', count($todosToDelete) - 1) . '?';
        $stmt = "UPDATE `todos` SET `isDeleted` = '1' WHERE `id` in ($in)";
        $query = $this->db->prepare($stmt);

        return $query->execute($todosToDelete);
    }



}