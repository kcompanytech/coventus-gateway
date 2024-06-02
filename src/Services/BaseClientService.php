<?php

namespace Kcompany\CoventusGateway\Services;

use Kcompany\CoventusGateway\Services\CurlService;

abstract class BaseClientService
{
    protected $curlService;

    public function __construct(CurlService $curlService)
    {
        $this->curlService = $curlService;
    }
}
