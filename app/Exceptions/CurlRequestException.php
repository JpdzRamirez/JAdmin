<?php

namespace App\Exceptions;

use Exception;

class CurlRequestException extends Exception
{
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {   
        $message = $message ?? __('exceptions.cURL_exception');
        parent::__construct($message, $code, $previous);
    }
}