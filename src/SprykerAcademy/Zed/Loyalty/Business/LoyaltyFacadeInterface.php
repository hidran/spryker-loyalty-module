<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace SprykerAcademy\Zed\Loyalty\Business;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;

interface LoyaltyFacadeInterface
{
    public function awardPointsForOrder(SaveOrderTransfer $orderTransfer, QuoteTransfer $quoteTransfer): void;

    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer;
}
