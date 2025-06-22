<?php

namespace SprykerAcademy\Zed\Loyalty\Business;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerAcademy\Zed\Loyalty\Business\LoyaltyBusinessFactory getFactory()
 */
class LoyaltyFacade extends AbstractFacade implements LoyaltyFacadeInterface
{
    public function awardPointsForOrder(OrderTransfer $orderTransfer): void
    {
        $this->getFactory()->createLoyaltyWriter()->awardPointsForOrder($orderTransfer);
    }

    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer
    {
        return $this->getFactory()->createLoyaltyReader()->getCustomerLoyalty($customerTransfer);
    }
}

