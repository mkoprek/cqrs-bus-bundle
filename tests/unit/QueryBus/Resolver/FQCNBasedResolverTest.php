<?php
declare(strict_types=1);

namespace Tests\MKoprek\CQRSBus\QueryBus\Resolver;

use MKoprek\CQRSBus\QueryBus\Resolver\FQCNBasedResolver;
use PHPUnit\Framework\TestCase;

class FQCNBasedResolverTest extends TestCase
{
    /** @test */
    public function resolveWithQueryStringShouldReturnQueryHandlerAsName(): void
    {
        $resolver = new FQCNBasedResolver();
        $handlerName = $resolver->resolve('Query');

        $this->assertEquals('QueryHandler', $handlerName);
    }

    /** @test */
    public function resolveWithEmptyShouldReturnHandlerAsName(): void
    {
        $resolver = new FQCNBasedResolver();
        $handlerName = $resolver->resolve('');

        $this->assertEquals('Handler', $handlerName);
    }
}
