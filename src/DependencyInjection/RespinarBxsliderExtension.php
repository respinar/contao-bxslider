<?php

declare(strict_types=1);

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Peywasti 2023 <hamid.peywasti@gmail.com>
 *
 * @license MIT
 */

namespace Respinar\BxsliderBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class RespinarBxsliderExtension extends Extension
{
    /**
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../config')
        );

        $loader->load('services.yaml');
    }
}
