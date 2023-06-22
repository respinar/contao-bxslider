<?php

declare(strict_types=1);

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Abbaszadeh 2023 <abbaszadeh.h@gmail.com>
 * @license MIT
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/respinar/contao-bxslider-bundle
 */

namespace Respinar\BxsliderBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RespinarContaoBxsliderBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
