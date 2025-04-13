<?php

declare(strict_types=1);

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Symfony\Component\Lock\Exception\LockAcquiringException;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Lock\LockInterface;
use Twig\Environment as TwigEnvironment;
use Symfony\Component\Cache\CacheItem;

final class MaintenanceModeListener
{
    private ?LockInterface $maintenanceLock = null;

    public function __construct(
        private TwigEnvironment $twig,
        private LockFactory $lockFactory,
        private ParameterBagInterface $params,
        private ?Profiler $profiler,
        private LoggerInterface $logger,
    ) {
    }

    #[AsEventListener(
        event: KernelEvents::REQUEST,
        priority: PHP_INT_MAX - 1000,
    )]
    public function handle(RequestEvent $event): void
    {
        /** @var bool $isMaintenance */
        /** @var CacheItem $isMaintenance */
        $isMaintenanceEnv   = \filter_var($this->params->get('app.maintenance_mode') ?? false, \FILTER_VALIDATE_BOOLEAN);

        if ($isMaintenanceEnv || $this->isMaintenanceModeActive()) {
            $this->disableIfProfilerIsAvailable($event);
            $event->setResponse(new Response(
                $this->twig->render('maintenance-mode.html.twig'),
                Response::HTTP_SERVICE_UNAVAILABLE,
            ));
            $event->stopPropagation();
        }
    }

    private function isMaintenanceModeActive(): bool
    {
        try {
            $this->maintenanceLock = $this->lockFactory->createLock('app.maintenance_mode', 60);

            if (!$this->maintenanceLock->acquire()) {
                return true;
            }

            $this->maintenanceLock->release();

        } catch (LockAcquiringException $e) {
            return true;
        }

        return false;
    }

    private function disableIfProfilerIsAvailable(RequestEvent $event): void
    {
        if ($this->profiler && $event->isMainRequest()) {
            $this->profiler->disable();
        }
    }
}
