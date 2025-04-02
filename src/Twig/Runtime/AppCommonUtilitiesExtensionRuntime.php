<?php

namespace App\Twig\Runtime;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Extension\RuntimeExtensionInterface;

class AppCommonUtilitiesExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private ParameterBagInterface $params,
    )
    {}

    public function getParameter($value):string
    {
        return $this->params->get($value);
    }
}
