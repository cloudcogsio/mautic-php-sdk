<?php

namespace Cloudcogs\MauticPHP\Api\Contacts\Fields;

class Field
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

    public function getId(): int
    {
        return $this->data['id'];
    }

    public function getLabel(): string
    {
        return $this->data['label'] ?? '';
    }

    public function getAlias(): string
    {
        return $this->data['alias'] ?? '';
    }

    public function getType(): string
    {
        return $this->data['type'] ?? '';
    }

    public function getGroup(): string
    {
        return $this->data['group'] ?? '';
    }

    public function getObject(): string
    {
        return $this->data['object'] ?? '';
    }

    public function isFixed(): int
    {
        return $this->data['fixed'] ?? 0;
    }

    public function getProperties(): string
    {
        return $this->data['properties'] ?? '';
    }

    public function getDefaultValue(): string
    {
        return $this->data['default_value'] ?? '';
    }

    public function getValue(): string
    {
        return $this->data['value'] ?? '';
    }

    public function getNormalizedValue(): string
    {
        return $this->data['normalized_value'] ?? '';
    }
}