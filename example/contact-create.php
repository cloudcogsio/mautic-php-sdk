<?php
require_once './vendor/autoload.php';

use Cloudcogs\MauticPHP\Api\Contacts\NewContact;
use Cloudcogs\MauticPHP\Config;
use Cloudcogs\MauticPHP\SDK;

$config = new Config(require_once './config/config.php');
$mautic = new SDK($config);

$contactsAPI = $mautic->getContactsApi();

$newContact = new NewContact($contactsAPI);
$contact = $newContact
    ->setField('firstname', 'John')
    ->setField('email', 'johndoe@example.com')
    ->overwriteWithBlank(true)
    ->save();

print_r($contact->getFields()->getAll());