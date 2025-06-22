<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace SprykerAcademy\Zed\Loyalty\Business\Reader;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyRepositoryInterface;

readonly class LoyaltyReader implements LoyaltyReaderInterface
{
    public function __construct(
        private LoyaltyRepositoryInterface $loyaltyRepository,
    ) {
    }

    public function getCustomerLoyalty(CustomerTransfer $customerTransfer): CustomerLoyaltyTransfer
    {
        $customerTransfer->requireIdCustomer();

        $customerLoyalty = $this->loyaltyRepository->findCustomerLoyaltyByIdCustomer(
            $customerTransfer->getIdCustomer(),
        );

        if ($customerLoyalty) {
            return $customerLoyalty;
        }

        // If no history exists, return a new, empty transfer with the correct customer details.
        return (new CustomerLoyaltyTransfer())
            ->setFkCustomer($customerTransfer->getIdCustomer())
            ->setCustomerReference($customerTransfer->getCustomerReference())
            ->setCurrentBalance(0);
    }
}
