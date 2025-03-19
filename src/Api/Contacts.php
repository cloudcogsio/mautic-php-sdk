<?php

namespace Cloudcogs\MauticPHP\Api;

use Cloudcogs\MauticPHP\Api\Contacts\Contact;
use Cloudcogs\MauticPHP\Api\Contacts\NewContact;
use Cloudcogs\MauticPHP\Api\Exceptions\ApiError;
use Cloudcogs\MauticPHP\Api\Exceptions\UndefinedResponse;

class Contacts extends AbstractApi
{
    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function getContactById(int $id): Contact
    {
        $contact = $this->get($id);
        return new Contact($this, $contact);
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function listContacts(string $search = '', int $start = 0, int $limit = 30, string $orderBy = '',
                                 string $orderByDir = 'ASC', bool $publishedOnly = false, bool $minimal = false) : array
    {
        $contacts = $this->getList($search, $start, $limit, $orderBy, $orderByDir, $publishedOnly, $minimal)[$this->context->listName()];
        $total = $this->response['total'];

        foreach ($contacts as $index => $contact) {
            $contacts[$index] = new Contact($this, $contact);
        }

        return [
            'total' => $total,
            $this->context->listName() => $contacts,
        ];
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function createContact(NewContact $newContact): Contact
    {
        $data = $newContact->getData();
        $contact = $this->create($data);
        return new Contact($this, $contact);
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function editContact(Contact $contact): Contact
    {
        $data = $contact->getUpdates();
        $contactId = $contact->getId();
        $updatedContact = $this->edit($contactId, $data);
        return new Contact($this, $updatedContact);
    }

    /**
     * @throws ApiError
     * @throws UndefinedResponse
     */
    public function deleteContact(Contact $contact): Contact
    {
        $contactId = $contact->getId();
        $deletedContact = $this->delete($contactId);
        return new Contact($this, $deletedContact);
    }
}