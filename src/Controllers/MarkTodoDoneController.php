<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\Interfaces\ITodoModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MarkTodoDoneController extends Controller
{
    private $todoModel;

    /**
     * MarkTodoDoneController constructor.
     * @param $todoModel
     */
    public function __construct(ITodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $get ='';

        $responseData = $request->getParsedBody();
        if (isset($responseData['id'])) {
            $queryCheck = $this->todoModel->markTodosDone($responseData['id']);
            if ($queryCheck){
                $get = '?success=2';
            } else {
                $get = '?error=1';
            }
        }

        return $response->withHeader('Location', './' . $get);
    }
}