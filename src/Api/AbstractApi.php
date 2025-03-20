<?php

namespace Cloudcogs\MauticPHP\Api;

use Cloudcogs\MauticPHP\Api\Exceptions\ApiError;
use Cloudcogs\MauticPHP\Api\Exceptions\UndefinedResponse;
use Cloudcogs\MauticPHP\SDK;
use Mautic\Api\Api;

abstract class AbstractApi
{
    protected Api $context;
    protected SDK $sdk;
    protected array $response;

    public function __construct(SDK $sdk, Api $context)
    {
        $this->sdk = $sdk;
        $this->context = $context;
    }

    public function getContext(): Api
    {
        return $this->context;
    }

    public function getLastResponse(): array
    {
        return $this->response;
    }

    /**
     * @throws UndefinedResponse
     * @throws ApiError
     */
    public function get(int $id): array
    {
        $this->response = $this->context->get($id);
        if (array_key_exists($this->context->itemName(), $this->response)) {
            return $this->response[$this->context->itemName()];
        };

        if (array_key_exists('errors', $this->response)) {
            $this->handleError();
        }

        throw new UndefinedResponse(sprintf("'%s' or 'error' not found", $this->context->itemName()));
    }

    /**
     * @param string $search - String or search command to filter entities by.
     * @param int $start - Starting row for the entities returned. Defaults to 0.
     * @param int $limit - Limit number of entities to return. Defaults to the system configuration for pagination (30).
     *
     * @param string $orderBy - Column to sort by. Can use any column listed in the response. However, all properties
     * in the response that are written in camelCase need to be changed a bit. Before every capital add an
     * underscore _ and then change the capital letters to non-capital letters. So dateIdentified becomes
     * date_identified, modifiedByUser becomes modified_by_user etc.
     *
     * @param string $orderByDir - Sort direction: asc or desc.
     * @param bool $publishedOnly - Only return currently published entities.
     * @param bool $minimal - Return only array of entities without additional lists in it.
     *
     * @return mixed
     * @throws UndefinedResponse|ApiError
     *
     */
    public function getList(string $search = '', int $start = 0, int $limit = 30, string $orderBy = '',
                            string $orderByDir = 'ASC', bool $publishedOnly = false, bool $minimal = false): mixed
    {
        $this->response = $this->context->getList($search, $start, $limit, $orderBy, $orderByDir, $publishedOnly, $minimal);
        if (array_key_exists($this->context->listName(), $this->response)) {
            return $this->response;
        };

        if (array_key_exists('errors', $this->response)) {
            $this->handleError();
        }

        throw new UndefinedResponse(sprintf("'%s' or 'error' not found", $this->context->listName()));
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function create(array $data): array
    {
        $this->response = $this->context->create($data);
        if (array_key_exists($this->context->itemName(), $this->response)) {
            return $this->response[$this->context->itemName()];
        };

        if (array_key_exists('errors', $this->response)) {
            $this->handleError();
        }

        throw new UndefinedResponse(sprintf("'%s' or 'error' not found", $this->context->itemName()));
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function edit(int $id, array $data): array
    {
        $this->response = $this->context->edit($id, $data);
        if (array_key_exists($this->context->itemName(), $this->response)) {
            return $this->response[$this->context->itemName()];
        }

        if (array_key_exists('errors', $this->response)) {
            $this->handleError();
        }

        throw new UndefinedResponse(sprintf("'%s' or 'error' not found", $this->context->itemName()));
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function delete(int $id): array
    {
        $this->response = $this->context->delete($id);
        if (array_key_exists($this->context->itemName(), $this->response)) {
            return $this->response[$this->context->itemName()];
        }

        if (array_key_exists('errors', $this->response)) {
            $this->handleError();
        }

        throw new UndefinedResponse(sprintf("'%s' or 'error' not found", $this->context->itemName()));
    }

    /**
     * @throws ApiError
     */
    protected function handleError()
    {
        $error = $this->response['errors'][0];
        throw new ApiError($error['message'], $error['code']);
    }
}