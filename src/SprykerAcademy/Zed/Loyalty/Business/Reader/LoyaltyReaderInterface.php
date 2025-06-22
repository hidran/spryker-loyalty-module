<?php

namespace SprykerAcademy\Zed\Loyalty\Business\Reader;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

interface LoyaltyReaderInterface
{
    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer;
}
