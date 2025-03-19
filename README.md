# Cloudcogs Mautic PHP SDK

[![Latest Stable Version](https://img.shields.io/badge/version-1.0-blue.svg)](https://github.com/cloudcogsio/mautic-php-sdk)
[![PHP Version](https://img.shields.io/badge/php-%5E8.2-blue)](https://www.php.net/releases/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

**Cloudcogs Mautic PHP SDK** is a lightweight PHP library that simplifies interaction with the Mautic REST API. Built on top of the official [Mautic PHP API library](https://github.com/mautic/api-library), it provides a more convenient and intuitive interface for managing contacts, campaigns, emails, and more.

*** UNDER DEVELOPMENT ***
---

## 📦 Installation
Install via **Composer**:
```sh
composer require cloudcogsio/mautic-php-sdk
```

## 🚀 Basic Usage
Once installed, you can quickly start interacting with the **Mautic API** using the **Cloudcogs Mautic PHP SDK**.

---

## 1️⃣ Setup Configuration
Before initializing the SDK, create a `config.php`. See `config.dist.php` for a template.
The SDK uses BasicAuth by default. OAuth2 support not available, but you can provide your own `$auth` object for usage.
```php
<?php

use Cloudcogs\MauticPHP\Constants;

return [
    Constants::CONFIG_KEY_MAUTIC => [
        Constants::CONFIG_MAUTIC_USERNAME => '',
        Constants::CONFIG_MAUTIC_PASSWORD => '',
    ],
    Constants::CONFIG_MAUTIC_API_URL => 'https://xxxxxxxxxxx/api/',
];
```

## 2️⃣ Initialize the SDK

```php
require_once './vendor/autoload.php';

use Cloudcogs\MauticPHP\Config;
use Cloudcogs\MauticPHP\SDK;

// Load configuration
$config = new Config(require_once './config/config.php');

// Initialize SDK
$mautic = new SDK($config);
```

## 3️⃣ Fetch and Display a Contact

```php
// Not $auth provided, BasicAuth will be used.
$contactsAPI = $mautic->getContactsApi();
```

The context classes can optionally accept an `$auth` object which allows you to use your own authentication method such as OAuth.
```php
// Initiate the auth object
$initAuth = new ApiAuth();
$auth     = $initAuth->newAuth($settings);
$contactsAPI = $mautic->getContactsApi($auth);
```

```php
$contact = $contactsAPI->getContactById(1);

echo "First Name: " . $contact->getFields()->getCore()->getFirstName();

```

### See `/example` for more usage examples