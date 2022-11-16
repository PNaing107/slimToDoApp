<?php
namespace App\Controllers;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class AddTaskAPIController
{
    private PhpRenderer $renderer;

    // Here, the parameter is automatically supplied by the Dependency Injection Container based on the type hint
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args): ResponseInterface
    {
        return $this->renderer->render($response, 'addTaskForm.php', $args);
    }
}