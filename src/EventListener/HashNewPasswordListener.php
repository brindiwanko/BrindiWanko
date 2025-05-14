<?php

namespace App\EventListener;

use App\Entity\User;
use Symfony\Component\Form\Event\PostSubmitEvent;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final readonly class HashNewPasswordListener
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher,
    )
    { }

    public function __invoke(PostSubmitEvent $event): void
    {
        /* @var User $user */
        $user = $event->getData();

        /** @var string $plainPassword */
        $plainPassword  = $event->getForm()->get('newPassword')->getData();
        $hashedPassword = $this->userPasswordHasher->hashPassword($user, $plainPassword);

        // encode the plain password
        $user->setPassword($hashedPassword);
    }
}