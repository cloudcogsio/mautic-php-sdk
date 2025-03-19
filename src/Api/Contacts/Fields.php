<?php

namespace Cloudcogs\MauticPHP\Api\Contacts;

use Cloudcogs\MauticPHP\Api\Contacts\Fields\Core;

class Fields
{
    protected array $data;
    protected \ArrayObject $core;
    protected \ArrayObject $social;
    protected \ArrayObject $personal;
    protected \ArrayObject $professional;
    protected array $all;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->core = new Core($data['core'] ?? []);
        $this->social = new \ArrayObject($data['social'] ?? []);
        $this->personal = new \ArrayObject($data['personal'] ?? []);
        $this->professional = new \ArrayObject($data['professional'] ?? []);
        $this->all = $data['all'] ?? [];
    }

    public function getData() : array
    {
        return $this->data;
    }

    public function getCore(): Core
    {
        return $this->core;
    }

    public function getSocial(): \ArrayObject
    {
        return $this->social;
    }

    public function getPersonal(): \ArrayObject
    {
        return $this->personal;
    }

    public function getProfessional(): \ArrayObject
    {
        return $this->professional;
    }

    public function getAll(): array
    {
        return $this->all;
    }
}