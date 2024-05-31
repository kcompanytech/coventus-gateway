<?php

namespace Kcompany\Service;

use Kcompany\Services\CurlService;
use Kcompany\Resources\Booking\EventBookingResponse;

class ClientService
{
    private $curlService;

    public function __construct($baseUrl, $clientId, $apiKey)
    {
        $this->curlService = new CurlService($baseUrl, $clientId, $apiKey);
    }

    public function getBookings($userId)
    {
        $endpoint = "publicBooking/api/bookings/$userId";
        $response = $this->curlService->get($endpoint);
        return new EventBookingResponse($response);
    }

}
