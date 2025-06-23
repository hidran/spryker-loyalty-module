<?php
namespace SprykerAcademy\Client\Loyalty\Zed;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\CustomerLoyaltyTransfer;

interface LoyaltyStubInterface
{
    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer;
}
