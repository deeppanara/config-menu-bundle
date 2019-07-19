<?php

namespace Dp\ConfigMenuBundle\Provider;

use Dp\ConfigMenuBundle\Builder\MenuTreeBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MenuProvider
{
    /**
     * An array of menu configuration
     *
     * @var array
     */
    protected $configuration;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Constructor
     *
     * @param array $configuration An array of menu configuration
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->configuration = $container->get('dp_menu.config.provider')->getConfiguration();
    }

    /**
     * Return configuration of menus
     *
     * @return bool
     */
    public function has(string $name)
    {
        return isset($this->configuration['menu'][$name]) ?? false ;
    }

    /**
     * Return configuration of menus
     *
     * @return bool
     */
    public function getMenu(string $name)
    {
        $menu = new MenuTreeBuilder($this->configuration['menu'][$name], $this->container);
        return $menu->createMenu($name);
    }

}