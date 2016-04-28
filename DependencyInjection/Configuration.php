<?php

namespace Minishlink\Bundle\WebPushBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('minishlink_web_push');

        $rootNode
            ->children()
                ->arrayNode('api_keys')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('GCM')
                            ->defaultValue('')
                        ->end()
                    ->end()
                ->end()
                ->integerNode('ttl')
                    ->defaultValue(2419200)
                ->end()
                ->integerNode('timeout')
                    ->defaultValue(30)
                ->end()
                ->booleanNode('automatic_padding')
                    ->defaultValue(true)
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
