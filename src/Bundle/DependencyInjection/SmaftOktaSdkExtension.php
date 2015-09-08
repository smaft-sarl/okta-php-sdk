<?php

namespace Smaft\OktaSdk\Bundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class SmaftOktaSdkExtension extends ConfigurableExtension
{
    public function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator([__DIR__ . '/../Resources/config']));
        $loader->load('services.yml');

        $container
            ->getDefinition('smaft_okta_sdk.client')
            ->replaceArgument(0, $mergedConfig['client_options'])
        ;
    }
}
