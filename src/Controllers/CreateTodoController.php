<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\Interfaces\ITodoModel;
use App\Interfaces\ITodoValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CreateTodoController extends Controller
{

    private $todoValidator;
    private $todoModel;

    /**
     * CreateTodoController constructor.
     * @param $validator
     * @param $todoModel
     */
    public function __construct(ITodoValidator $validator,ITodoModel $todoModel)
    {
        $this->todoValidator = $validator;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $responseData = $request->getParsedBody();
        $get = '';

        if (isset($responseData['todoName'])) {
            $todo = $responseData['todoName'];
            $validCheck = $this->todoValidator->validateTodo($todo);
            if ($validCheck) {
                $insertCheck = $this->todoModel->createTodo($todo);
                if ($insertCheck){
                    $get = "?success=1" ;
                } else {
                    $get = "?error=1";
                }
            } else {
                $get = "?invalid=1";
            }
        }

        return $response->withHeader('Location', './' . $get);
    }
}