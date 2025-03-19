<?php
require_once './vendor/autoload.php';

use Cloudcogs\MauticPHP\Api\Contacts\Contact;
use Cloudcogs\MauticPHP\Config;
use Cloudcogs\MauticPHP\SDK;

$config = new Config(require_once './config/config.php');
$mautic = new SDK($config);

$contactsAPI = $mautic->getContactsApi();

// Get contact from Mautic
$contact = $contactsAPI->getContactById(1);

// Alternatively, create a contact object using the id only.
//$contact = new Contact($contactsAPI, ['id' => 1]);

// Delete Contact
$contact = $contact->delete();

print_r($contact);