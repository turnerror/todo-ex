<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\Interfaces\ITodoModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class TodoPageController extends Controller
{
    private $todoModel;
    private $renderer;

    /**
     * ToDoPageController constructor.
     * @param ITodoModel $todoModel
     * @param $renderer
     */
    public function __construct(ITodoModel $todoModel, PhpRenderer $renderer)
    {
        $this->todoModel = $todoModel;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = [];
        $data['completed'] = $this->todoModel->getCompletedTodos();
        $data['uncompleted'] = $this->todoModel->getUnCompletedTodos();

        $queryParams = $request->getQueryParams();
        if (isset($queryParams['success']))
        {
            switch ($queryParams['success']) {
                case 1:
                    $data['createMsg'] = "Todo has been created!";
                    break;
                case 2:
                    $data['markDoneMsg'] = "Todos have been marked as done!";
                    break;
                case 3:
                    $data['deleteMsg'] = "Todos have been deleted!";
                    break;
            }
        }
        if (isset($queryParams['error']))
        {
            if ($queryParams['error'] == 1){
                $data['error'] = "There was an error, please try again later";
            }
        }
        if (isset($queryParams['invalid']))
        {
            if ($queryParams['invalid'] == 1){
                $data['createMsg'] = "A new task must have atleast character";
            }
        }
        return $this->renderer->render($response, 'index.php', $data);
    }


}