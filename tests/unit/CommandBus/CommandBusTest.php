<?php
declare(strict_types=1);

namespace Tests\MKoprek\CQRSBus\CommandBus;

use MKoprek\CQRSBus\CommandBus\CommandBus;
use MKoprek\CQRSBus\CommandBus\CommandInterface;
use League\Tactician\CommandBus as TacticianCommandBus;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CommandBusTest extends TestCase
{
    /** @var CommandBus */
    private $commandBus;
    
    /** @var MockObject */
    private $tacticianCommandBus;
    
    public function setUp(): void
    {
        parent::setUp();
        
        $this->tacticianCommandBus = $this
            ->getMockBuilder(TacticianCommandBus::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $this->commandBus = new CommandBus($this->tacticianCommandBus);
    }
    
    /** @test */
    public function commandBusHandlesCommand(): void
    {
        /** @var CommandInterface|MockObject $command */
        $command = $this->getMockBuilder(CommandInterface::class)->getMock();

        $this->tacticianCommandBus
            ->expects($this->once())
            ->method('handle')
            ->with($command);

        $this->commandBus->handle($command);
    }
}
