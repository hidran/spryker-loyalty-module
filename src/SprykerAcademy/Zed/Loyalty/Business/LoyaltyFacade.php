<?php

namespace SprykerAcademy\Zed\Loyalty\Business;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerAcademy\Zed\Loyalty\Business\LoyaltyBusinessFactory getFactory()
 */
class LoyaltyFacade extends AbstractFacade implements LoyaltyFacadeInterface
{
    public function awardPointsForOrder(SaveOrderTransfer $orderTransfer, QuoteTransfer $quoteTransfer): void
    {
        $this->getFactory()->createLoyaltyWriter()->awardPointsForOrder($orderTransfer,$quoteTransfer);
    }

    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer
    {
        return $this->getFactory()->createLoyaltyReader()->getCustomerLoyalty($customerTransfer);
    }
}

