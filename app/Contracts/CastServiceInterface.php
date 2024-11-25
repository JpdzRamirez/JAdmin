<?php

namespace App\Contracts;

interface CastServiceInterface
{
    public function processPhoto(object $photo);
    public function formatDate(string $date,string $format);
}