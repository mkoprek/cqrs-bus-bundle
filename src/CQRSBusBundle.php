<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus;

use MKoprek\CQRSBus\DependencyInjection\Compiler\QueryBusHandlersCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @codeCoverageIgnore
 */
class CQRSBusBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->addCompilerPass(new QueryBusHandlersCompilerPass());
    }
}
