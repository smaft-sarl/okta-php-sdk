<?php

namespace Smaft\OktaSdk\Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('smaft_okta_sdk');

        $clientConfiguration = new \Smaft\OktaSdk\Configuration();
        $clientConfiguration->addConfiguration(
            $rootNode
                ->children()
                ->arrayNode('client_options')
                ->isRequired()
        );

        return $treeBuilder;
    }
}
