<?php

namespace App\Contracts;

interface CityServiceInterface
{
    public function fetchCities($stateId);
    public function getCountryId($countryName);
    public function getStateId($stateName, $countryID);
}