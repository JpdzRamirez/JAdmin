<?php

namespace App\Services;

class GeoLocationHandler
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function syncLocation(array $geoLocation): array
    {
        return [
            'country' => $geoLocation['country'],
            'state' => $geoLocation['state'],
            'city' => $geoLocation['city']
        ];
    }
}