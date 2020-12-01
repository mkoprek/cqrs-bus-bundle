<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\CommandBus;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $command): void;
}
