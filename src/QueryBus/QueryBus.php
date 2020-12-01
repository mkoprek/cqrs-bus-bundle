<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\QueryBus;

use MKoprek\CQRSBus\QueryBus\Resolver\ResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class QueryBus implements QueryBusInterface
{
    private ContainerInterface $container;
    private ResolverInterface $resolver;

    public function __construct(ContainerInterface $container, ResolverInterface $resolver)
    {
        $this->container = $container;
        $this->resolver = $resolver;
    }

    /** @return mixed */
    public function handle(QueryInterface $query)
    {
        $queryName = get_class($query);

        /** @var QueryHandlerInterface $handler */
        $handler = $this->getHandler($queryName);

        return $handler->handle($query);
    }

    private function getHandler(string $queryName): QueryHandlerInterface
    {
        $handlerName = $this->resolver->resolve($queryName);

        return $this->container->get($handlerName);
    }
}
