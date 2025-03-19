<?php

namespace Cloudcogs\MauticPHP\Api\Contacts;

class Owner
{
    protected array $data;

    public function __construct(array $ownerData)
    {
        $this->data = $ownerData;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getId(): int
    {
        return $this->data['id'] ?? 0;
    }

    public function getUsername(): string
    {
        return trim($this->data['username']) ?? '';
    }

    public function getFirstName(): string
    {
        return trim($this->data['firstName']) ?? '';
    }

    public function getLastName(): string
    {
        return trim($this->data['lastName']) ?? '';
    }

    public function getFullName(): string
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }

    public function getCreatedByUser(): string
    {
        return $this->data['createdByUser'] ?? '';
    }

    public function getModifiedByUser(): string
    {
        return $this->data['modifiedByUser'] ?? '';
    }
}