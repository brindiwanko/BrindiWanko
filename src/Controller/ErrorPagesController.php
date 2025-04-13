<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class ErrorPagesController extends AbstractController
{
    public function show(FlattenException $exception): Response
    {
        $statusCode = $exception->getStatusCode();

        $template = match (true) {
            $statusCode >= 500 => 'error_pages/error500.html.twig',
            $statusCode >= 400 => 'error_pages/error400.html.twig',
            default => 'error_pages/error.html.twig'
        };

        return $this->render($template, [
            'status_code' => $statusCode,
            'exception' => $exception,
        ]);
    }
}
