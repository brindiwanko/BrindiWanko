<?php

namespace App\EventListener;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\Event\PostSubmitEvent;

final readonly class AssignAsAdminIfDatabaseHasNoAdminsRegisterListener
{
    public function __construct(
        private UserRepository $userRepository,
    )
    {}

    public function __invoke(PostSubmitEvent $event): void
    {
        $admins = $this->userRepository->findAdmins(limit: 2);

        if (!empty($admins)) {
            return;
        }

        /* @var User $user */
        $user = $event->getData();
        $user->setRoles(['ROLE_ADMIN']);
    }
}