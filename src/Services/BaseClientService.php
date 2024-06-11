<?php

namespace Kcompany\CoventusGateway\Services;

abstract class BaseClientService
{
    
    protected CurlService $curlService;
    
    /**
     * __construct
     *
     * @param  CurlService $curlService
     * @return void
     */
    public function __construct(CurlService $curlService)
    {
        $this->curlService = $curlService;
    }
}
