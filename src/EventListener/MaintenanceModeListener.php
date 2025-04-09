<?php

namespace App\EventListener;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment as TwigEnvironment;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use function filter_var;
use const FILTER_VALIDATE_BOOLEAN;

final class MaintenanceModeListener
{
	public function __construct(
		private TwigEnvironment $twig,
		private CacheItemPoolInterface $cache,
        private ParameterBagInterface $params,
        private ?Profiler $profiler,
	)
	{}

    #[AsEventListener(
        event: KernelEvents::REQUEST,
        priority: PHP_INT_MAX - 1000,
    )]
	public function handle(RequestEvent $event): void
	{
		/** @var bool $isMaintenance */
		/** @var Symfony\Component\Cache\CacheItem $isMaintenance */
        $isMaintenanceEnv = filter_var($this->params->get('app.maintenance_mode') ?? false, FILTER_VALIDATE_BOOLEAN);
		$isMaintenanceCache = (($cache = $this->cache->getItem('app.maintenance_mode')) !== null && $cache->get() !== null);
		
        if ($isMaintenanceEnv || $isMaintenanceCache) {
            $this->disableIfProfilerIsAvailable($event);
	        $event->setResponse(new Response(
		        $this->twig->render('maintenance-mode.html.twig'),
		        Response::HTTP_SERVICE_UNAVAILABLE,
	        ));
	        $event->stopPropagation();
        }
	}

    protected function disableIfProfilerIsAvailable(RequestEvent $event): void
    {
        if ($this->profiler && $event->isMainRequest()) {
            $this->profiler->disable();
        }
    }
}
