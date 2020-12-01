<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @codeCoverageIgnore
 */
class CQRSBusExtension extends Extension
{
    // phpcs:disable
    public function load(array $configs, ContainerBuilder $container): void
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->registerExtension(new CQRSBusExtension());

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
}
