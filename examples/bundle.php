<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

use Smaft\OktaSdk\Bundle\SmaftOktaSdkBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    /**
     * @var callable
     */
    private $configLoaderClosure;

    public function __construct($environment, $debug, $configLoaderClosure)
    {
        parent::__construct($environment, $debug);

        $this->configLoaderClosure = $configLoaderClosure;
    }

    public function registerBundles()
    {
        return array(
            new FrameworkBundle(),
            new SmaftOktaSdkBundle()
        );
    }

    public function getCacheDir()
    {
        return sys_get_temp_dir() . '/SmaftOktaSdkBundle/';
    }

    public function getLogDir()
    {
        return sys_get_temp_dir() . '/SmaftOktaSdkBundle/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->configLoaderClosure, 'closure');
    }
}

$kernel = new AppKernel('dev', true, function (ContainerBuilder $container) {
    $container->loadFromExtension('framework', [
        'secret' => 'secret',
    ]);
    $container->loadFromExtension('smaft_okta_sdk', [
        'client_options' => require __DIR__ . '/../config.php',
    ]);
});
$kernel->boot();

$client = $kernel->getContainer()->get('smaft_okta_sdk.client');
$users = $client->listUser();

var_dump($users);
