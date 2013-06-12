<?php

namespace Mtech\DirectAdminBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mtech_direct_admin');

        $rootNode
            ->children()
                ->variableNode('username')
                    ->defaultValue('admin')
                ->end()
                ->variableNode('password')
                    ->defaultValue('')
                ->end()
                ->variableNode('host')
                    ->defaultValue('127.0.0.1')
                ->end()
                ->integerNode('port')
                    ->defaultValue(2222)
                ->end()
            ->end();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
