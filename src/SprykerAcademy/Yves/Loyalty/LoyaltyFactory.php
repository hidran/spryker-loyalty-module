<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerAcademy\Yves\Loyalty;

use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class LoyaltyFactory extends AbstractFactory
{
    public function getCustomerClient(): CustomerClientInterface
    {
        return $this->getProvidedDependency(LoyaltyDependencyProvider::CLIENT_CUSTOMER);
    }
}
