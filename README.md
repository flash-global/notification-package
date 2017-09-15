# Notification Package

This package provide Notification Client integration for Objective PHP applications.

## Installation

Notification Package needs **PHP 7.0** or up to run correctly.

You will have to integrate it to your Objective PHP project with `composer require fei/notification-package`.

## Integration

As shown below, the Notification Package must be plugged in the application initialization method.
The Notification Package create a Notifier Client service that will be consumed by the application's middleware.

```php
<?php

use ObjectivePHP\Application\AbstractApplication;
use Fei\Service\Notification\Package\NotificationPackage;

class Application extends AbstractApplication
{
    public function init()
    {
        // Define some application steps
        $this->addSteps('bootstrap', 'init', 'auth', 'route', 'rendering');
        
        // Initializations...

        // Plugging the Notification Package in the bootstrap step
        $this->getStep('bootstrap')
        ->plug(NotificationPackage::class);

        // Another initializations...
    }
}
```

The name of the service will be `notification.client`. If you want to rename it, you can plug the package like this:

```
			// Plugging the Notification Package in the bootstrap step
			$this->getStep('bootstrap')
			->plug(new NotificationPackage('my_service'));
```

### Application configuration
``
Create a file in your configuration directory and put your Notification configuration as below:

```php
<?php
use Fei\Service\Notification\Package\Config\NotificationParam;
use Fei\ApiClient\Transport\BasicTransport;

return [
    (new NotificationParam())
        ->setBaseUrl('http://notification.dev')
        ->setTransport(new BasicTransport())
];
```

In the previous example you need to set these configurations:

* `NotificationParam` : represent the URL where the API can be contacted in order to send and retrieve the notifications

Please check out `notification-client` documentation for more information about how to use this client.