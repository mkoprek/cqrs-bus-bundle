<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @codeCoverageIgnore
 */
class QueryBusHandlersCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        // phpcs:disable
        foreach ($container->findTaggedServiceIds('cqrs.query_bus.handler') as $id => $tags) {
            $definition = $container->findDefinition($id);
            $definition->setPublic(true);
        }
    }
}
