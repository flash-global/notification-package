<?php
namespace Fei\Service\Notification\Package\Config;

use Fei\ApiClient\Transport\AsyncTransportInterface;
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
    public function setBaseUrl(string $baseUrl)
    {
        $this->value['baseUrl'] = $baseUrl;

        return $this;
    }

    /**
     * Set Sync transport
     *
     * @param SyncTransportInterface $transport
     *
     * @return NotificationParam
     */
    public function setTransport(SyncTransportInterface $transport)
    {
        $this->value['transport'] = $transport;

        return $this;
    }

    /**
     * Set Async transport
     *
     * @param AsyncTransportInterface $transport
     *
     * @return $this
     */
    public function setAsyncTransport(AsyncTransportInterface $transport)
    {
        $this->value['asyncTransport'] = $transport;

        return $this;
    }
}
