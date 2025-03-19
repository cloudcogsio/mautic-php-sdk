<?php
require_once './vendor/autoload.php';

use Cloudcogs\MauticPHP\Config;
use Cloudcogs\MauticPHP\SDK;

$config = new Config(require_once './config/config.php');
$mautic = new SDK($config);

$contactsAPI = $mautic->getContactsApi();
$contact = $contactsAPI->getContactById(1);

print_r($contact->getFields()->getCore()->getFirstName());