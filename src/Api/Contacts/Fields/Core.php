<?php

namespace Cloudcogs\MauticPHP\Api\Contacts\Fields;

class Core extends \ArrayObject
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        parent::__construct($this->data);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getTitle(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['title'])) return '';

        if ($returnObject) {
            return new Field($this->data['title']);
        } else {
            return $this->data['title']['value'];
        }
    }

    public function getFirstName(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['firstname'])) return '';

        if ($returnObject) {
            return new Field($this->data['firstname']);
        } else {
            return $this->data['firstname']['value'];
        }
    }

    public function getLastName(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['lastname'])) return '';

        if ($returnObject) {
            return new Field($this->data['lastname']);
        } else {
            return $this->data['lastname']['value'];
        }
    }

    public function getEmail(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['email'])) return '';

        if ($returnObject) {
            return new Field($this->data['email']);
        } else {
            return $this->data['email']['value'];
        }
    }

    public function getCompany(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['company'])) return '';

        if ($returnObject) {
            return new Field($this->data['company']);
        } else {
            return $this->data['company']['value'];
        }
    }

    public function getPosition(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['position'])) return '';

        if ($returnObject) {
            return new Field($this->data['position']);
        } else {
            return $this->data['position']['value'];
        }
    }

    public function getPhone(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['phone'])) return '';

        if ($returnObject) {
            return new Field($this->data['phone']);
        } else {
            return $this->data['phone']['value'];
        }
    }

    public function getMobile(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['mobile'])) return '';

        if ($returnObject) {
            return new Field($this->data['mobile']);
        } else {
            return $this->data['mobile']['value'];
        }
    }

    public function getWebsite(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['website'])) return '';

        if ($returnObject) {
            return new Field($this->data['website']);
        } else {
            return $this->data['website']['value'];
        }
    }

    public function getPoints(bool $returnObject = false): int|Field
    {
        if (!isset($this->data['points'])) return 0;

        if ($returnObject) {
            return new Field($this->data['points']);
        } else {
            return $this->data['points']['value'];
        }
    }

    public function getAddress1(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['address1'])) return '';

        if ($returnObject) {
            return new Field($this->data['address1']);
        } else {
            return $this->data['address1']['value'];
        }
    }

    public function getAddress2(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['address2'])) return '';

        if ($returnObject) {
            return new Field($this->data['address2']);
        } else {
            return $this->data['address2']['value'];
        }
    }

    public function getCity(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['city'])) return '';

        if ($returnObject) {
            return new Field($this->data['city']);
        } else {
            return $this->data['city']['value'];
        }
    }

    public function getState(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['state'])) return '';

        if ($returnObject) {
            return new Field($this->data['state']);
        } else {
            return $this->data['state']['value'];
        }
    }

    public function getZipcode(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['zipcode'])) return '';

        if ($returnObject) {
            return new Field($this->data['zipcode']);
        } else {
            return $this->data['zipcode']['value'];
        }
    }

    public function getCountry(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['country'])) return '';

        if ($returnObject) {
            return new Field($this->data['country']);
        } else {
            return $this->data['country']['value'];
        }
    }

    public function getTimezone(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['timezone'])) return '';

        if ($returnObject) {
            return new Field($this->data['timezone']);
        } else {
            return $this->data['timezone']['value'];
        }
    }

    public function getAttributionDate(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['attribution_date'])) return '';

        if ($returnObject) {
            return new Field($this->data['attribution_date']);
        } else {
            return $this->data['attribution_date']['value'];
        }
    }

    public function getAttribution(bool $returnObject = false): string|Field
    {
        if (!isset($this->data['attribution'])) return '';

        if ($returnObject) {
            return new Field($this->data['attribution']);
        } else {
            return $this->data['attribution']['value'];
        }
    }
}