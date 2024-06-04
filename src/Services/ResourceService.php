<?php

namespace Kcompany\CoventusGateway\Services;

class ResourceService extends BaseClientService
{
    public function getResources()
    {
        return $this->curlService->get('publicBooking/api/resources');
    }
}