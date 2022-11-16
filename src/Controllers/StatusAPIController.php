<?php

namespace App\Controllers;
use App\Models\Task;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class StatusAPIController
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
        $result = $this->model->updateTask($body);
        if ($result) {
            return $response->withHeader('Location', '/tasks');
        } else {
            $response->getBody()->write('<p>Unable to update task</p>');
            return $response;
        }
    }
}