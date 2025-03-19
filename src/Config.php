<?php

namespace Cloudcogs\MauticPHP;

class Config
{
    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getConfig() : array
    {
        return $this->config;
    }

    public function getMauticSettings() : ?array
    {
        return $this->config[Constants::CONFIG_KEY_MAUTIC];
    }

    public function getMauticUsername() : ?string
    {
        return $this->config[Constants::CONFIG_KEY_MAUTIC][Constants::CONFIG_MAUTIC_USERNAME];
    }

    public function getMauticPassword() : ?string
    {
        return $this->config[Constants::CONFIG_KEY_MAUTIC][Constants::CONFIG_MAUTIC_PASSWORD];
    }

    public function getMauticApiUrl() : ?string
    {
        return $this->config[Constants::CONFIG_MAUTIC_API_URL];
    }
}