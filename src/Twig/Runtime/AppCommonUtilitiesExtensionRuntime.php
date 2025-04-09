<?php

declare(strict_types=1);

namespace App\Twig\Runtime;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\RuntimeExtensionInterface;

class AppCommonUtilitiesExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private ParameterBagInterface $params,
        private RequestStack $requestStack,
    ) {
    }

    public function getParameter($value): string
    {
        return $this->params->get($value);
    }

    public function getExecutionTime(): string
    {
        $request = $this->requestStack->getMainRequest();

        return $request->attributes->get('execution_time');
    }
}
