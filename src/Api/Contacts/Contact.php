<?php

namespace Cloudcogs\MauticPHP\Api\Contacts;

use Cloudcogs\MauticPHP\Api\Contacts;
use Cloudcogs\MauticPHP\Api\Exceptions\ApiError;
use Cloudcogs\MauticPHP\Api\Exceptions\UndefinedResponse;

class Contact
{
    use Traits;

    protected array $updates = [];
    protected Contacts $contactsApi;

    public function __construct(Contacts $contactsApi, array $data)
    {
        $this->data = $data;
        $this->contactsApi = $contactsApi;
    }

    public function getId(): int
    {
        return $this->data['id'];
    }

    public function isPublished(): bool
    {
        return $this->data['isPublished'];
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function getDateAdded(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->data['dateAdded']);
    }

    public function getCreatedBy(): ?int
    {
        return $this->data['createdBy'];
    }

    public function getCreatedByUser(): ?string
    {
        return $this->data['createdByUser'];
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function getDateModified(): ?\DateTimeImmutable
    {
        return (!is_null($this->data['dateModified'])) ? new \DateTimeImmutable($this->data['dateModified']) : null;
    }

    public function getModifiedBy(): ?int
    {
        return $this->data['modifiedBy'];
    }

    public function getModifiedByUser(): ?string
    {
        return $this->data['modifiedByUser'];
    }

    public function getOwner(): ?Owner
    {
        return new Owner($this->data['owner']);
    }

    public function getPoints(): int
    {
        return $this->data['points'] ?? 0;
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function getLastActive(): ?\DateTimeImmutable
    {
        return (!is_null($this->data['lastActive'])) ? new \DateTimeImmutable($this->data['lastActive']) : null;
    }

    public function getDateIdentified(): ?\DateTimeImmutable
    {
        return (!is_null($this->data['dateIdentified'])) ? new \DateTimeImmutable($this->data['dateIdentified']) : null;
    }

    public function getColor(): ?string
    {
        return $this->data['color'] ?? null;
    }

    public function getIpAddresses(): array
    {
        $ipAddresses = $this->data['ipAddresses'];
        $ipAddressList = [];
        foreach ($ipAddresses as $entry) {
            $ipAddress = $entry['ipAddress'];
            $ipDetails = $entry['ipDetails'];
            $ipAddressList[$ipAddress] = new IpAddress($ipAddress, $ipDetails);
        }

        return $ipAddressList;
    }

    public function getFields(): Fields
    {
        return new Fields($this->data['fields']);
    }

    public function getTags(): array
    {
        return $this->data['tags'] ?? [];
    }

    public function getUtmtags(): array
    {
        return $this->data['utmtags'] ?? [];
    }

    public function getDoNotContact(): array
    {
        return $this->data['doNotContact'] ?? [];
    }

    public function getFrequencyRules(): array
    {
        return $this->data['frequencyRules'] ?? [];
    }

    public function updateField(string $fieldAlias, $value): static
    {
        $allFields = $this->getFields()->getAll();
        if (array_key_exists($fieldAlias, $allFields))
        {
            $this->updates[$fieldAlias] = $value;
            $this->data[$fieldAlias] = $value;
        }

        return $this;
    }

    public function getUpdates(): array
    {
        // These fields have defined setters that update the $data values only, not $updates.
        // We need to check if they exist and copy them into the $updates list.
        $extras = ['ipAddress','lastActive','ownerId','overwriteWithBlanks'];
        foreach ($extras as $field)
        {
            if (array_key_exists($field, $this->data)) $this->updates[$field] = $this->data[$field];
        }
        return $this->updates;
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function save(): Contact
    {
        return $this->contactsApi->editContact($this);
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function delete(): Contact
    {
        return $this->contactsApi->deleteContact($this);
    }
}