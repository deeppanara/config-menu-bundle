<?php

/*
 * This file is part of the SncRedisBundle package.
 *
 * (c) Henrik Westphal <henrik.westphal@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dp\ConfigMenuBundle;

use Snc\RedisBundle\DependencyInjection\Compiler\LoggingPass;
use Snc\RedisBundle\DependencyInjection\Compiler\MonologPass;
use Snc\RedisBundle\DependencyInjection\Compiler\SwiftMailerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * SncRedisBundle
 */
class DpConfigMenuBundle extends Bundle
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }
}
