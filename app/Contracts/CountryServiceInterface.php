<?php

namespace App\Contracts;

interface CountryServiceInterface
{
    public function fetchCountries();
    public function getCountryId($countryName);
}