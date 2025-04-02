<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/hello-world', name: 'app_hello_world')]
final class HelloWorldController extends AbstractController
{
    public function __invoke(
        Request $request,
    ): Response
    {
        return $this->render('hello_world/index.html.twig', [
            'execution_time' => $request->attributes->get('execution_time'),
        ]);
    }
}
