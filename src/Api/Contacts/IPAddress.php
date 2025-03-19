<?php

namespace Cloudcogs\MauticPHP\Api\Contacts;

class IPAddress
{
    protected string $ipAddress;
    protected IPDetails $ipDetails;

    public function __construct(string $ipAddress, array $ipDetails)
    {
        $this->ipAddress = $ipAddress;
        $this->ipDetails = new IPDetails($ipDetails);
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function getIpDetails(): IPDetails
    {
        return $this->ipDetails;
    }

    public function __toString(): string
    {
        return $this->ipAddress;
    }
}