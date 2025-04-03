<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Bundle\SecurityBundle\Security;

final class CheckIfUserIsActiveListener
{
    public function __construct(
        private Security $security,
        private RequestStack $requestStack,
    )
    {}
    #[AsEventListener(
        event: KernelEvents::RESPONSE,
        priority: -100,
    )]
    public function onKernelResponse(
        ResponseEvent $event,
    ): void
    {
        //$session = $this->requestStack->getSession();
        $user = $this->security->getUser();

        if (!$user) return;

        // @todo check if user is active
        //$event->getRequest()->attributes->set('_current_user_id', $user);
        //$session->set('current_user_id', $user->getId());
    }
}
