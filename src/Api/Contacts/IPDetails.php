<?php

namespace Cloudcogs\MauticPHP\Api\Contacts;

class IPDetails
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getCity(): string
    {
        return $this->data['city'] ?? '';
    }

    public function getRegion(): string
    {
        return $this->data['region'] ?? '';
    }

    public function getCountry(): string
    {
        return $this->data['country'] ?? '';
    }

    public function getLatitude(): string
    {
        return $this->data['latitude'] ?? '';
    }

    public function getLongitude(): string
    {
        return $this->data['longitude'] ?? '';
    }

    public function getIsp(): string
    {
        return $this->data['isp'] ?? '';
    }

    public function getOrganization(): string
    {
        return $this->data['organization'] ?? '';
    }

    public function getTimezone(): string
    {
        return $this->data['timezone'] ?? '';
    }
}