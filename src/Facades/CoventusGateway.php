<?php

namespace Kcompany\CoventusGateway\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kcompany\CoventusGateway\CoventusGateway
 */
class CoventusGateway extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Kcompany\CoventusGateway\CoventusGateway::class;
    }
}
