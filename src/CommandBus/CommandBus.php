<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\CommandBus;

use League\Tactician\CommandBus as TacticianCommandBus;

class CommandBus implements CommandBusInterface
{
    /**
     * @var TacticianCommandBus
     */
    private $commandBus;

    public function __construct(TacticianCommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function handle(CommandInterface $command): void
    {
        $this->commandBus->handle($command);
    }
}
