<?php

namespace Cloudcogs\MauticPHP\Api\Contacts;

use Cloudcogs\MauticPHP\Api\Contacts;
use Cloudcogs\MauticPHP\Api\Exceptions\ApiError;
use Cloudcogs\MauticPHP\Api\Exceptions\UndefinedResponse;

class NewContact
{
    use Traits;

    protected Contacts $contactsApi;

    public function __construct(Contacts $contactsApi)
    {
        $this->contactsApi = $contactsApi;
    }

    public function setField(string $fieldAlias, $fieldValue): static
    {
        $this->data[$fieldAlias] = $fieldValue;
        return $this;
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function save(): Contact
    {
        return $this->contactsApi->createContact($this);
    }
}