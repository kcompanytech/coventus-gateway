<?php

namespace Kcompany\CoventusGateway\Services;

use Kcompany\CoventusGateway\Services\BookingService;
use Kcompany\CoventusGateway\Services\CategoryService;

class ClientService
{
    private $bookingService;
    private $categoryService;

    public function __construct(BookingService $bookingService, CategoryService $categoryService)
    {
        $this->bookingService = $bookingService;
        $this->categoryService = $categoryService;
    }

    public function getBookingService()
    {
        return $this->bookingService;
    }

    public function getCategoryService()
    {
        return $this->categoryService;
    }
}
