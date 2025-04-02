<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/hello-world', name: 'app_hello_world')]
final class HelloWorldController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('hello_world/index.html.twig');
    }
}
