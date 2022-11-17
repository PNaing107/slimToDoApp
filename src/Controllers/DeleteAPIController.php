<?php

namespace App\Controllers;
use App\Models\Task;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class DeleteAPIController
{
    private PhpRenderer $renderer;

    // Here, the parameter is automatically supplied by the Dependency Injection Container based on the type hint
    public function __construct(PhpRenderer $renderer, Task $task)
    {
        $this->renderer = $renderer;
        $this->model = $task;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $body = $request->getParsedBody();
        $result = $this->model->deleteTask($body);
        if ($result < 0) {
            return $response->withHeader('Location', '/tasks');
        } else {
            $errorCodes = [
                //0
                'Task to be deleted cannot be found',
                //1
                'Error: Unable to delete the task (1)',
                //2
                'Error: Unable to delete the task (2)'
            ];
            $response->getBody()->write('<p>' . $errorCodes[$result] . '</p>');
            return $response;
        }
    }
}