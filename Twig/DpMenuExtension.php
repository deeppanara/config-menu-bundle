<?php

namespace Dp\ConfigMenuBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\TwigTest;

/**
 */
class DpMenuExtension extends AbstractExtension
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container a container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('dp_menu_render', [$this, 'dpMenuRender'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dpmenu';
    }

    public function dpMenuRender($name)
    {
        $provider = $this->container->get('dp_menu.menu.provider');

        return $provider->getMenu($name);
    }
}
