<?php

namespace Kcompany\CoventusGateway\Services;

abstract class BaseClientService
{
    protected $curlService;

    public function __construct(CurlService $curlService)
    {
        $this->curlService = $curlService;
    }
}
