<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);
namespace SprykerAcademy\Client\Loyalty;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \SprykerAcademy\Client\Loyalty\LoyaltyFactory getFactory()
 */
class LoyaltyClient extends AbstractClient implements LoyaltyClientInterface
{
    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer
    {
        return $this->getFactory()
            ->createLoyaltyStub()
            ->getCustomerLoyalty($customerTransfer);
    }
}
