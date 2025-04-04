<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExecutionTimeListener
{
    private float $startTime;
    #[AsEventListener(
        event: KernelEvents::REQUEST,
        priority: PHP_INT_MAX,
    )]
    public function onStartTimer(RequestEvent $event): void
    {
        $this->startTime = microtime(true);
    }

    // Symfony\Bridge\Twig\EventListener\TemplateAttributeListener::onKernelView() has a priority of -128
    #[AsEventListener(
        event: KernelEvents::CONTROLLER,
        priority: 1,
    )]
    public function onEndTimer(ControllerEvent $event): void
    {
        if (!$event->isMainRequest()) return;

        $endTime = microtime(as_float: true);

        $event->getRequest()->attributes->set(
            key: 'execution_time',
            value: number_format($endTime - $this->startTime, 3) . 's'
        );
    }
}
