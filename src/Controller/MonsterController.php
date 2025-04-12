<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Monster;
use App\Form\MonsterType;
use App\Repository\MonsterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/monster')]
final class MonsterController extends AbstractController{
    #[Route(name: 'app_monster_index', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(MonsterRepository $monsterRepository): Response
    {
        return $this->render('monster/index.html.twig', [
            'monsters' => $monsterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_monster_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $monster = new Monster();
        $form = $this->createForm(MonsterType::class, $monster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($monster);
            $entityManager->flush();

            return $this->redirectToRoute('app_monster_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('monster/new.html.twig', [
            'monster' => $monster,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_monster_show', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function show(Monster $monster): Response
    {
        return $this->render('monster/show.html.twig', [
            'monster' => $monster,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_monster_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Monster $monster, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MonsterType::class, $monster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_monster_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('monster/edit.html.twig', [
            'monster' => $monster,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_monster_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Monster $monster, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$monster->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($monster);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_monster_index', [], Response::HTTP_SEE_OTHER);
    }
}
