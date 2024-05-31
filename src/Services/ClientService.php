<?php

namespace Kcompany\Service;

use Kcompany\Resources\Booking\EventBookingResponse;
use Kcompany\Services\CurlService;

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
