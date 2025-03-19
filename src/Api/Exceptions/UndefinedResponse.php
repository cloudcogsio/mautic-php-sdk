<?php

namespace Cloudcogs\MauticPHP\Api\Exceptions;

class UndefinedResponse extends \Exception
{
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        $message = sprintf("UndefinedResponse: %s", $message);
        parent::__construct($message, $code, $previous);
    }
}