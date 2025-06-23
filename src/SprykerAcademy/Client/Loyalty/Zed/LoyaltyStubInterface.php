<?php
namespace SprykerAcademy\Client\Loyalty\Zed;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

interface LoyaltyStubInterface
{
    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer;
}
