<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerAcademy\Client\Loyalty;

use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use SprykerAcademy\Client\Loyalty\Zed\LoyaltyStub;
use SprykerAcademy\Client\Loyalty\Zed\LoyaltyStubInterface;

class LoyaltyFactory extends AbstractFactory
{
    public function createLoyaltyStub(): LoyaltyStubInterface
    {
        return new LoyaltyStub($this->getZedRequestClient());
    }

    protected function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(LoyaltyDependencyProvider::CLIENT_ZED_REQUEST);
    }
}

