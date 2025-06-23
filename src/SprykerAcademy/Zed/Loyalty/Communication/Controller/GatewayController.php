<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace SprykerAcademy\Zed\Loyalty\Communication\Controller;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;
/**
 * @method \SprykerAcademy\Zed\Loyalty\Business\LoyaltyFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{

    public function getCustomerLoyaltyAction(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer
    {
        return $this->getFacade()->getCustomerLoyalty($customerTransfer);
    }
}
