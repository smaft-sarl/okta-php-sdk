<?php

namespace Smaft\OktaSdk;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class Configuration
{
    public function process(array $config)
    {
        $rootNode = $this->getRootNode();
        $config = $rootNode->normalize($config);
        $config = $rootNode->finalize($config);

        if (isset($config['request']['options'])) {
            $config[OktaClient::REQUEST_OPTIONS] = $config['request']['options'];
            unset($config['request']['options']);
        }
        if (isset($config['curl']['options'])) {
            $config[OktaClient::CURL_OPTIONS] = $config['curl']['options'];
            unset($config['curl']['options']);
        }
        if (isset($config['command']['params'])) {
            $config[OktaClient::COMMAND_PARAMS] = $config['command']['params'];
            unset($config['command']['params']);
        }

        return $config;
    }

    private function getRootNode()
    {
        $nodeBuilder = new NodeBuilder();
        $rootNode = $nodeBuilder->arrayNode(null);

        $this->addConfiguration($rootNode);

        return $rootNode->getNode();
    }

    public function addConfiguration(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->beforeNormalization()
                ->always(function($config) {
                    if (isset($config[OktaClient::REQUEST_OPTIONS])) {
                        $config['request']['options'] = $config[OktaClient::REQUEST_OPTIONS];
                        unset($config[OktaClient::REQUEST_OPTIONS]);
                    }
                    if (isset($config[OktaClient::CURL_OPTIONS])) {
                        $config['curl']['options'] = $config[OktaClient::CURL_OPTIONS];
                        unset($config[OktaClient::CURL_OPTIONS]);
                    }
                    if (isset($config[OktaClient::COMMAND_PARAMS])) {
                        $config['command']['params'] = $config[OktaClient::COMMAND_PARAMS];
                        unset($config[OktaClient::COMMAND_PARAMS]);
                    }

                    return $config;
                })
            ->end()
            ->children()
                ->scalarNode('api_key')
                    ->isRequired()
                ->end()
                ->scalarNode('host')
                    ->isRequired()
                    ->info('org.okta.com')
                ->end()
                ->enumNode('protocol')
                    ->defaultValue('https')
                    ->values(['http', 'https'])
                ->end()
                ->arrayNode('request')
                    ->children()
                        ->arrayNode('options')
                            ->prototype('variable')->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('curl')
                    ->children()
                        ->arrayNode('options')
                            ->prototype('variable')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
