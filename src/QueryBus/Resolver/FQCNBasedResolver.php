<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\QueryBus\Resolver;

class FQCNBasedResolver implements ResolverInterface
{
    private const HANDLER_SUFFIX = 'Handler';

    public function resolve(string $queryName): string
    {
        return $queryName . self::HANDLER_SUFFIX;
    }
}
