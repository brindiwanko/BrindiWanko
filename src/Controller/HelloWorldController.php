<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

#[Route('/hello-world', name: 'app_hello_world')]
#[Route('/test-access/', name: 'app_test_access')]
final class HelloWorldController extends AbstractController
{
    public function __invoke(
        Request $request,
        #[CurrentUser] ?UserInterface $user,
    ): Response
    {
        if('app_test_access' === $request->attributes->get('_route') && null === $user) {
            return $this->redirectToRoute('login');
        }
        return $this->render('hello_world/index.html.twig', [
            'execution_time' => $request->attributes->get('execution_time'),
        ]);
    }
}
