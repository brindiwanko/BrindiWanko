<?php

namespace App\Controller;

use App\Entity\Town;
use App\Form\TownType;
use App\Repository\TownRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/town')]
final class TownController extends AbstractController{
    #[Route(name: 'app_town_index', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(TownRepository $townRepository): Response
    {
        return $this->render('town/index.html.twig', [
            'towns' => $townRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_town_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $town = new Town();
        $form = $this->createForm(TownType::class, $town);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($town);
            $entityManager->flush();

            return $this->redirectToRoute('app_town_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('town/new.html.twig', [
            'town' => $town,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_town_show', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function show(Town $town): Response
    {
        return $this->render('town/show.html.twig', [
            'town' => $town,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_town_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Town $town, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TownType::class, $town);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_town_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('town/edit.html.twig', [
            'town' => $town,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_town_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Town $town, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$town->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($town);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_town_index', [], Response::HTTP_SEE_OTHER);
    }
}
