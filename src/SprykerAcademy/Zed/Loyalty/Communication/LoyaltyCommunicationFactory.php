<?php

declare(strict_types=1);

namespace SprykerAcademy\Zed\Loyalty\Communication;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerAcademy\Zed\Loyalty\LoyaltyDependencyProvider;

class LoyaltyCommunicationFactory extends AbstractCommunicationFactory
{
    public function getLogger(): LoggerInterface
    {
        return $this->getProvidedDependency(LoyaltyDependencyProvider::PLUGIN_LOGGER);
    }
}
