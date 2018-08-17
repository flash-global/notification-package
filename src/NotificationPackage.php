<?php
namespace Fei\Service\Notification\Package;

use Fei\Service\Notification\Client\Notifier;
use Fei\Service\Notification\Package\Config\NotificationParam;
use ObjectivePHP\Application\ApplicationInterface;

/**
 * Class NotificationPackage
 *
 * @package Fei\Service\Notification\Package
 */
class NotificationPackage
{
    const DEFAULT_IDENTIFIER = 'notification.client';

    /** @var string */
    protected $identifier;

    /** @var string */
    protected $class;

    /**
     * NotificationPackage constructor.
     *
     * @param string $serviceIdentifier
     * @param string $class
     */
    public function __construct(string $serviceIdentifier = self::DEFAULT_IDENTIFIER, string $class = Notifier::class)
    {
        $this->identifier = $serviceIdentifier;
        $this->class = $class;
    }

    public function __invoke(ApplicationInterface $app)
    {
        $params = $app->getConfig()->get(NotificationParam::class);

        $service = [
            'id' => $this->identifier,
            'class' => $this->class,
            'params' => [
                [
                    Notifier::OPTION_BASEURL => $params['baseUrl']
                ],
            ],
            'setters' => [
                'setTransport' => $params['transport'],
            ]
        ];

        if (array_key_exists('asyncTransport', $params)) {
            $service['setters']['setAsyncTransport'] = $params['asyncTransport'];
        }

        $app->getServicesFactory()->registerService($service);
    }
}
