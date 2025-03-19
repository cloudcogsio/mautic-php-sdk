<?php
require_once './vendor/autoload.php';

use Cloudcogs\MauticPHP\Config;
use Cloudcogs\MauticPHP\SDK;

$config = new Config(require_once './config/config.php');
$mautic = new SDK($config);

$contactsAPI = $mautic->getContactsApi();
$contacts = $contactsAPI->listContacts('John Doe', 0, 5);

print $contacts['total']."\n";

/**
 * @var  $id
 * @var \Cloudcogs\MauticPHP\Api\Contacts\Contact $contact
 */
foreach ($contacts['contacts'] as $id => $contact) {
    print $contact->getFields()->getCore()->getEmail()."\n";
}