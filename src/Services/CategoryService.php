<?php

namespace Kcompany\CoventusGateway\Services;

class CategoryService extends BaseClientService
{
    public function getCategories()
    {
        return $this->curlService->get("publicBooking/api/categories");
    }
}
