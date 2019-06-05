<?php

namespace Dp\ConfigMenuBundle\Builder;

use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 */
class MenuTreeBuilder
{
    private $menu;

    /**
     */
    public function __construct($menuConfig, $container) {
        $this->container = $container;
        $this->menuConfig = $menuConfig;
    }
    /**
     * Creates a child menu node
     *
     * @param  string $name The name of the node
     */
    public function createMenu($name)
    {

        $factory = new MenuFactory();
        $this->menu = $factory->createItem($this->menuConfig['label']);

        $this->createNode($this->menuConfig);

        $renderer = new ListRenderer(new \Knp\Menu\Matcher\Matcher());
        echo $renderer->render($this->menu);
    }

    /**
     * Creates a child menu node
     *
     * @param  string $name The name of the node
     */
    protected function createNode($config)
    {

        foreach ($config['children'] as $nodeConfigLV1) {
            $this->menu->addChild($nodeConfigLV1['label']);
            $this->setNodeAttribute($this->menu[$nodeConfigLV1['label']], $nodeConfigLV1);

            if (array_key_exists('children', $nodeConfigLV1)) {

                foreach ($nodeConfigLV1['children'] as $nodeConfigLV2) {

                    $this->menu[$nodeConfigLV1['label']]->addChild($nodeConfigLV2['label']);
                    $this->setNodeAttribute($this->menu[$nodeConfigLV1['label']][$nodeConfigLV2['label']], $nodeConfigLV2);

                    if (array_key_exists('children', $nodeConfigLV2)) {

                        foreach ($nodeConfigLV2['children'] as $nodeConfigLV3) {

                            $this->menu[$nodeConfigLV1['label']][$nodeConfigLV2['label']]->addChild($nodeConfigLV3['label']);
                            $this->setNodeAttribute($this->menu[$nodeConfigLV1['label']][$nodeConfigLV2['label']][$nodeConfigLV3['label']], $nodeConfigLV3);

                            if (array_key_exists('children', $nodeConfigLV3)) {

                                foreach ($nodeConfigLV3['children'] as $nodeConfigLV4) {

                                    $this->menu[$nodeConfigLV1['label']][$nodeConfigLV2['label']][$nodeConfigLV3['label']]->addChild($nodeConfigLV4['label']);
                                    $this->setNodeAttribute($this->menu[$nodeConfigLV1['label']][$nodeConfigLV2['label']][$nodeConfigLV3['label']][$nodeConfigLV4['label']], $nodeConfigLV4);
                                } //for
                            } //if
                        }//for
                    } //if
                }//for
            } //if
        }//for
    }

    protected function setNodeAttribute(&$menu, $nodeConfig)
    {
        if (isset($nodeConfig['url'])) {
            $menu->setUri($nodeConfig['url']);
        } elseif (isset($nodeConfig['route'])) {
            $router = $this->container->get('router');
            if (null !== $route = $router->getRouteCollection()->get($nodeConfig['route'])) {
                $path = $this->container->get('router')->generate($nodeConfig['route'], $parameters ?? [], UrlGeneratorInterface::ABSOLUTE_URL);
                $menu->setUri($path);
            }
        }
    }
}
