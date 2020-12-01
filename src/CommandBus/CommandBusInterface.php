<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\CommandBus;

interface CommandBusInterface
{
    public function handle(CommandInterface $command): void;
}
