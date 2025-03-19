<?php

namespace Cloudcogs\MauticPHP\Api\Exceptions;

class ApiError extends \Exception
{
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        $message = sprintf("Mautic API Error: %s", $message);
        parent::__construct($message, $code, $previous);
    }
}