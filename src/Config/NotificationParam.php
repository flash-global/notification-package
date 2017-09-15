<?php
namespace Fei\Service\Notification\Package\Config;

use Fei\ApiClient\Transport\SyncTransportInterface;
use ObjectivePHP\Config\SingleValueDirective;

/**
 * Class NotificationParam
 */
class NotificationParam extends SingleValueDirective
{
    /**
     * NotificationParam constructor.
     *
     * @param array $value
     */
    public function __construct(array $value = [])
    {
        parent::__construct($value);
    }

    /**
     * @param string $baseUrl
     * @return NotificationParam
     */
    public function setBaseUrl(string $baseUrl): self
    {
        $this->value['baseUrl'] = $baseUrl;

        return $this;
    }

    /**
     * @param SyncTransportInterface $transport
     * @return NotificationParam
     */
    public function setTransport(SyncTransportInterface $transport): self
    {
        $this->value['transport'] = $transport;

        return $this;
    }
}
