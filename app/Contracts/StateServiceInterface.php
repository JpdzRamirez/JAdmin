<?php

namespace App\Contracts;

interface StateServiceInterface
{
    public function fetchStates($countryName);
    public function getStateId($stateName, $countryID);
}