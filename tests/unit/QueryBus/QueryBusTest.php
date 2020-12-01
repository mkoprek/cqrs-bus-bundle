<?php
declare(strict_types=1);

namespace Tests\MKoprek\CQRSBus\QueryBus;

use MKoprek\CQRSBus\QueryBus\QueryBus;
use MKoprek\CQRSBus\QueryBus\QueryHandlerInterface;
use MKoprek\CQRSBus\QueryBus\QueryInterface;
use MKoprek\CQRSBus\QueryBus\Resolver\ResolverInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class QueryBusTest extends TestCase
{
    /** @var MockObject */
    private $container;
    
    /** @var MockObject */
    private $resolver;
    
    /** @var QueryBus */
    private $queryBus;
    
    public function setUp(): void
    {
        parent::setUp();
        
        /** @var MockObject $container */
        $this->container = $this->getMockBuilder(ContainerInterface::class)->getMock();
        
        /** @var MockObject $resolver */
        $this->resolver = $this->getMockBuilder(ResolverInterface::class)->getMock();
        
        $this->queryBus = new QueryBus($this->container, $this->resolver);
    }
    
    /** @test **/
    public function handleQuerySucceed(): void
    {
        $query = $this->getMockBuilder(QueryInterface::class)->getMock();
        $handler = $this->getMockBuilder(QueryHandlerInterface::class)->getMock();
        $result = ['test' => 1];

        $this->resolver
            ->expects($this->once())
            ->method('resolve')
            ->willReturn('QueryHandler');

        $this->container
            ->expects($this->once())
            ->method('get')
            ->with('QueryHandler')
            ->willReturn($handler);
        
        $handler
            ->expects($this->once())
            ->method('handle')
            ->with($query)
            ->willReturn($result);

        $this->assertEquals($result, $this->queryBus->handle($query));
    }
}
