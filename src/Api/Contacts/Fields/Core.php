<?php

namespace Cloudcogs\MauticPHP\Api\Contacts\Fields;

class Core extends \ArrayObject
{
    protected array $data;

    public const FIELD_TITLE = "title";
    public const FIELD_FIRSTNAME = "firstname";
    public const FIELD_LASTNAME = "lastname";
    public const FIELD_EMAIL = "email";
    public const FIELD_COMPANY = "company";
    public const FIELD_POSITION = "position";
    public const FIELD_PHONE = "phone";
    public const FIELD_MOBILE = "mobile";
    public const FIELD_WEBSITE = "website";
    public const FIELD_POINTS = "points";
    public const FIELD_ADDRESS1 = "address1";
    public const FIELD_ADDRESS2 = "address2";
    public const FIELD_CITY = "city";
    public const FIELD_STATE = "state";
    public const FIELD_ZIPCODE = "zipcode";
    public const FIELD_COUNTRY = "country";
    public const FIELD_TIMEZONE = "timezone";
    public const FIELD_ATTRIBUTION_DATE = "attribution_date";
    public const FIELD_ATTRIBUTION = "attribution";

    public function __construct(array $data)
    {
        $this->data = $data;
        parent::__construct($this->data);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getTitle(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_TITLE])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_TITLE]);
        } else {
            return $this->data[self::FIELD_TITLE]['value'];
        }
    }

    public function getFirstName(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_FIRSTNAME])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_FIRSTNAME]);
        } else {
            return $this->data[self::FIELD_FIRSTNAME]['value'];
        }
    }

    public function getLastName(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_LASTNAME])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_LASTNAME]);
        } else {
            return $this->data[self::FIELD_LASTNAME]['value'];
        }
    }

    public function getEmail(bool $returnObject = false): string|Field
    {
        if (!isset($this->data[self::FIELD_EMAIL])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_EMAIL]);
        } else {
            return $this->data[self::FIELD_EMAIL]['value'];
        }
    }

    public function getCompany(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_COMPANY])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_COMPANY]);
        } else {
            return $this->data[self::FIELD_COMPANY]['value'];
        }
    }

    public function getPosition(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_POSITION])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_POSITION]);
        } else {
            return $this->data[self::FIELD_POSITION]['value'];
        }
    }

    public function getPhone(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_PHONE])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_PHONE]);
        } else {
            return $this->data[self::FIELD_PHONE]['value'];
        }
    }

    public function getMobile(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_MOBILE])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_MOBILE]);
        } else {
            return $this->data[self::FIELD_MOBILE]['value'];
        }
    }

    public function getWebsite(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_WEBSITE])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_WEBSITE]);
        } else {
            return $this->data[self::FIELD_WEBSITE]['value'];
        }
    }

    public function getPoints(bool $returnObject = false): int|Field|null
    {
        if (!isset($this->data[self::FIELD_POINTS])) return 0;

        if ($returnObject) {
            return new Field($this->data[self::FIELD_POINTS]);
        } else {
            return $this->data[self::FIELD_POINTS]['value'];
        }
    }

    public function getAddress1(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_ADDRESS1])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_ADDRESS1]);
        } else {
            return $this->data[self::FIELD_ADDRESS1]['value'];
        }
    }

    public function getAddress2(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_ADDRESS2])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_ADDRESS2]);
        } else {
            return $this->data[self::FIELD_ADDRESS2]['value'];
        }
    }

    public function getCity(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_CITY])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_CITY]);
        } else {
            return $this->data[self::FIELD_CITY]['value'];
        }
    }

    public function getState(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_STATE])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_STATE]);
        } else {
            return $this->data[self::FIELD_STATE]['value'];
        }
    }

    public function getZipcode(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_ZIPCODE])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_ZIPCODE]);
        } else {
            return $this->data[self::FIELD_ZIPCODE]['value'];
        }
    }

    public function getCountry(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_COUNTRY])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_COUNTRY]);
        } else {
            return $this->data[self::FIELD_COUNTRY]['value'];
        }
    }

    public function getTimezone(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_TIMEZONE])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_TIMEZONE]);
        } else {
            return $this->data[self::FIELD_TIMEZONE]['value'];
        }
    }

    public function getAttributionDate(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_ATTRIBUTION_DATE])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_ATTRIBUTION_DATE]);
        } else {
            return $this->data[self::FIELD_ATTRIBUTION_DATE]['value'];
        }
    }

    public function getAttribution(bool $returnObject = false): string|Field|null
    {
        if (!isset($this->data[self::FIELD_ATTRIBUTION])) return '';

        if ($returnObject) {
            return new Field($this->data[self::FIELD_ATTRIBUTION]);
        } else {
            return $this->data[self::FIELD_ATTRIBUTION]['value'];
        }
    }
}