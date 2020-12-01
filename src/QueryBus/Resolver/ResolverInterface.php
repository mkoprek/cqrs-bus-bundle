<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\QueryBus\Resolver;

interface ResolverInterface
{
    public function resolve(string $queryName): string;
}
