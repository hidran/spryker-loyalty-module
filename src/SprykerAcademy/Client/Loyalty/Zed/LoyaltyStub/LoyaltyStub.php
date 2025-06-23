<?php
namespace SprykerAcademy\Client\Loyalty\Zed;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Spryker\Client\Kernel\AbstractStub;

class LoyaltyStub extends AbstractStub implements LoyaltyStubInterface
{

    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer
    {
        /** @var \Generated\Shared\Transfer\CustomerLoyaltyTransfer $customerLoyaltyTransfer */
        $customerLoyaltyTransfer = $this->zedRequestClient->call(
            '/loyalty/gateway/get-customer-loyalty',
            $customerTransfer
        );

        return $customerLoyaltyTransfer;
    }
}
