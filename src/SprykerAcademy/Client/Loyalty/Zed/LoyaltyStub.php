<?php
namespace SprykerAcademy\Client\Loyalty\Zed;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\ZedRequest\ZedRequestClient;


class LoyaltyStub  implements LoyaltyStubInterface
{
 public function __construct(private ZedRequestClient $zedRequestClient) {}
    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer
    {
        /** @var CustomerLoyaltyTransfer $customerLoyaltyTransfer */
      //  $findAgentResponseTransfer = $this->zedRequestClient->call('/agent/gateway/find-agent-by-username', );

            $customerLoyaltyTransfer = $this->zedRequestClient->call('/loyalty/gateway/get-customer-loyalty', $customerTransfer);

        return $customerLoyaltyTransfer;
    }
}
