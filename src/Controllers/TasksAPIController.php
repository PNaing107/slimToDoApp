<?php

declare(strict_types=1);


namespace App\Controllers;


use App\Models\TasksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class TasksAPIController
{
    private TasksModel $model;

    // Here, the parameter is automatically supplied by the Dependency Injection Container based on the type hint
    public function __construct(PhpRenderer $renderer, TasksModel $model)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $tasks = $this->model->getTasks();
        return $this->renderer->render($response, 'tasks.php', ['tasks' => $tasks]);
    }

}