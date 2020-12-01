<?php
declare(strict_types=1);

namespace MKoprek\CQRSBus\QueryBus;

interface QueryBusInterface
{
    /**
     * @return mixed
     */
    public function handle(QueryInterface $query);
}
