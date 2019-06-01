<?php

/*
 * This file is part of the SncRedisBundle package.
 *
 * (c) Henrik Westphal <henrik.westphal@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dp\ConfigMenuBundel\DependencyInjection;

use Snc\RedisBundle\DependencyInjection\Configuration\Configuration;
use Snc\RedisBundle\DependencyInjection\Configuration\RedisDsn;
use Snc\RedisBundle\DependencyInjection\Configuration\RedisDsnInterface;
use Snc\RedisBundle\DependencyInjection\Configuration\RedisEnvDsn;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * SncRedisExtension
 */
class DpConfigMenuExtension extends Extension
{
    /**
     * Loads the configuration.
     *
     * @param array            $configs   An array of configurations
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws InvalidConfigurationException
     */
    public function load(array $configs, ContainerBuilder $container)
    {
    }

}
