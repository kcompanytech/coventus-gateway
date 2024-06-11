<?php

namespace Kcompany\CoventusGateway\Services;

class ResourceService extends BaseClientService
{    
    /**
     * getResources
     *
     * @return array
     */
    public function getResources(): array|string|null
    {
        return $this->curlService->get('publicBooking/api/resources');
    }
}
