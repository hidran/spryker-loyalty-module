<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerAcademy\Zed\Loyalty\Persistence;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\LoyaltyRuleTransfer;

interface LoyaltyRepositoryInterface
{

    public function findCustomerLoyaltyByIdCustomer(int $idCustomer): ?CustomerLoyaltyTransfer;

    public function findActiveLoyaltyRuleByType(string $ruleType): ?LoyaltyRuleTransfer;
}
