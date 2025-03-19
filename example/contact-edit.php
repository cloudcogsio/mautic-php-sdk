<?php
require_once './vendor/autoload.php';

use Cloudcogs\MauticPHP\Config;
use Cloudcogs\MauticPHP\SDK;

$config = new Config(require_once './config/config.php');
$mautic = new SDK($config);

$contactsAPI = $mautic->getContactsApi();

// Get contact
$contact = $contactsAPI->getContactById(1);

// Update fields & save
$contact = $contact->updateField('lastname','Doe')
    ->save();

print_r($contact->getFields()->getCore()->getLastname());