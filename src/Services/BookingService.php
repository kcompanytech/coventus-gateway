<?php

namespace Kcompany\CoventusGateway\Services;

class BookingService extends BaseClientService
{    
    /**
     * getBookings
     *
     * @param  string $from
     * @param  string $to
     * @param  array $resource
     * @return array
     */
    public function getBookings(string $from, string $to, array $resource): array|string|null
    {
        $endpoint = 'publicBooking/api/bookings';

        // Convert the filtered integers to a semicolon-separated string
        $resourceString = implode(';', $resource);

        return $this->curlService->get($endpoint, ['from' => $from, 'to' => $to, 'resources' => $resourceString]);
    }
}
