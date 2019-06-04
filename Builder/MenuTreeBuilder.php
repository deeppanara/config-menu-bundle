<?php

namespace Dp\ConfigMenuBundle\Builder;

use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;

/**
 */
class MenuTreeBuilder
{
    private $menu;

    /**
     */
    public function __construct($menuConfig) {
        $this->menuConfig = $menuConfig;
        dump($this->menuConfig);
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
    protected function createNode($config, $label = '')
    {

        foreach ($config['children'] as $nodeConfig) {

            if ($label == '') {
                $this->menu->addChild($nodeConfig['label']);
            } else {
                $this->menu[$label]->addChild($nodeConfig['label']);
            }

            if (array_key_exists('children', $nodeConfig)) {
                $this->createNode($nodeConfig, $nodeConfig['label']);
            }
        }

    }
}
