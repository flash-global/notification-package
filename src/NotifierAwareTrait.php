<?php
namespace Fei\Service\Notification\Package;

use Fei\Service\Notification\Client\Notifier;
use ObjectivePHP\ServicesFactory\Annotation\Inject;

/**
 * Class NotifierAwareTrait
 *
 * @package Fei\Service\Notification\Package
 */
trait NotifierAwareTrait
{
    /**
     * @var Notifier
     * @Inject(service="notification.client")
     */
    protected $notifier;

    /**
     * Get Notifier
     *
     * @return Notifier
     */
    public function getNotifier(): Notifier
    {
        return $this->notifier;
    }

    /**
     * Set Notifier
     *
     * @param Notifier $notifier
     *
     * @return $this
     */
    public function setNotifier(Notifier $notifier)
    {
        $this->notifier = $notifier;

        return $this;
    }
}
