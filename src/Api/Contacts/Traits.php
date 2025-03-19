<?php

namespace Cloudcogs\MauticPHP\Api\Contacts;

trait Traits
{
    protected array $data = [];

    public function getData(): array
    {
        return $this->data;
    }

    public function setIpAddress(string $ipAddress): static
    {
        $this->data['ipAddress'] = $ipAddress;
        return $this;
    }

    public function setLastActive(\DateTime $lastActive): static
    {
        $this->data['lastActive'] = $lastActive->format('c');
        return $this;
    }

    public function setOwnerId(int $ownerId): static
    {
        $this->data['ownerId'] = $ownerId;
        return $this;
    }

    /**
     * @param bool $overwriteWithBlanks - If true, then empty values are set to fields, otherwise empty values are skipped.
     * @return $this
     */
    public function overwriteWithBlank(bool $overwriteWithBlanks = false): static
    {
        $this->data['overwriteWithBlanks'] = $overwriteWithBlanks;
        return $this;
    }
}