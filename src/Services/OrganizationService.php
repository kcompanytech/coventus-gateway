<?php

namespace Kcompany\CoventusGateway\Services;

class OrganizationService extends BaseClientService
{
    public function getOrganizations()
    {
        return $this->curlService->get("dataudv/api/adressebog/get_organisationer.php");
    }
}