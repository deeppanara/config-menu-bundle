<?php

namespace Dp\ConfigMenuBundle\Provider;

class ConfigurationProvider
{
    /**
     * An array of menu configuration
     *
     * @var array
     */
    protected $configuration;
    /**
     * Constructor
     *
     * @param array $configuration An array of menu configuration
     */
    public function __construct(array $configuration = array()) {
        $this->configuration = $configuration;
    }
    /**
     * Load configuration of menus
     *
     * @param array $configuration An array of menu configuration
     */
    public function setConfiguration(array $configuration)
    {
        $this->configuration = $configuration;
    }
    /**
     * Return configuration of menus
     *
     * @return array
     */
    public function getConfiguration()
    {
        return $this->configuration[0];
    }

    /**
     * {@inheritDoc}
     */
    public function has($name, array $options = array())
    {
        return !empty($this->configuration[$name]);
    }
}