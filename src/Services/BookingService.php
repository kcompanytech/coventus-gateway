<?php

namespace Kcompany\CoventusGateway\Services;

class BookingService extends BaseClientService
{
    public function getBookings(int $from, int $to, array $resource)
    {
        $endpoint = 'publicBooking/api/bookings';
        // Filter the array to include only integers
        $filteredResource = array_filter($resource, function ($value) {
            return is_int($value);
        });

        // Convert the filtered integers to a semicolon-separated string
        $resourceString = implode(';', $filteredResource);

        return $this->curlService->get($endpoint, ['from' => $from, 'to' => $to, 'resource' => $resourceString]);
    }
}
