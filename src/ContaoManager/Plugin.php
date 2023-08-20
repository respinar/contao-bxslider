<?php

declare(strict_types=1);

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Peywasti 2023 <abbaszadeh.h@gmail.com>
 *
 * @license MIT
 */

namespace Respinar\BxsliderBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Respinar\BxsliderBundle\RespinarBxsliderBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(RespinarBxsliderBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
