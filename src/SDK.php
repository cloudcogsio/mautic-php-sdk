<?php

namespace Cloudcogs\MauticPHP;

use Cloudcogs\MauticPHP\Api\Contacts;
use Mautic\Auth\ApiAuth;
use Mautic\Auth\AuthInterface;
use Mautic\Exception\ContextNotFoundException;
use Mautic\MauticApi;

class SDK
{
    protected Config $config;
    protected MauticApi $mauticApi;
    public CONST BASIC_AUTH = 'BasicAuth';
    public CONST API_CONTEXT_CONTACTS = 'contacts';

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->mauticApi = new MauticApi();
    }

    public function getBasicAuthorization(): AuthInterface
    {
        $initAuth = new ApiAuth();
        return $initAuth->newAuth($this->config->getMauticSettings(), self::BASIC_AUTH);
    }

    public function getApi(): MauticApi
    {
        return $this->mauticApi;
    }

    /**
     * @param AuthInterface|null $auth - If no AuthInterface is passed, the SDK will attempt to use BasicAuth from config data.
     * @return Contacts - Contacts API with convenience methods for managing contacts
     * @throws ContextNotFoundException
     */
    public function getContactsApi(?AuthInterface $auth = null): Contacts
    {
        if (is_null($auth)) {
            $auth = $this->getBasicAuthorization();
        }
        return new Contacts($this, $this->mauticApi
            ->newApi(self::API_CONTEXT_CONTACTS,
                $auth,
                $this->config->getMauticApiUrl()
            )
        );
    }
}