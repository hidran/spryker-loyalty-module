<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace SprykerAcademy\Zed\Loyalty\Business\Writer;

use Generated\Shared\Transfer\LoyaltyPointTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use SprykerAcademy\Zed\Loyalty\LoyaltyConfig;
use SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyEntityManagerInterface;
use SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyRepositoryInterface;

class LoyaltyWriter implements LoyaltyWriterInterface
{
    // The type of rule we look for when awarding points for an order.
    private const EARN_RULE_TYPE_ORDER = 'EARN_PER_CURRENCY_UNIT';

    public function __construct(
        private readonly LoyaltyEntityManagerInterface $loyaltyEntityManager,
        private readonly LoyaltyRepositoryInterface $loyaltyRepository,
        private readonly LoyaltyConfig $loyaltyConfig,
    ) {
    }

    public function awardPointsForOrder(OrderTransfer $orderTransfer): void
    {
        $earningRule = $this->loyaltyRepository->findActiveLoyaltyRuleByType(static::EARN_RULE_TYPE_ORDER);

        // If no active earning rule is configured, we do nothing.
        if ($earningRule === null) {
            return;
        }

        $orderTransfer->requireTotals()->requireCustomer();
        $customer = $orderTransfer->getCustomer();
        $customer->requireIdCustomer();

        // Calculate points based on the rule's value (e.g., 1 point per 100 cents)
        $pointsToAward = (int)floor($orderTransfer->getTotals()->getGrandTotal() * $earningRule->getValue());

        if ($pointsToAward <= 0) {
            return;
        }

        $loyaltyPointTransfer = (new LoyaltyPointTransfer())
            ->setFkCustomer($customer->getIdCustomer())
            ->setFkSalesOrder($orderTransfer->getIdSalesOrder())
            ->setFkLoyaltyRule($earningRule->getIdLoyaltyRule())
            ->setPoints($pointsToAward)
            ->setType('EARNED')
            ->setSource($this->loyaltyConfig->getOrderPlacementSource())
            ->setDescription(
                sprintf('%d points earned for order %s', $pointsToAward, $orderTransfer->getOrderReference()),
            )
            ->setEarnedAt(date('Y-m-d H:i:s'));

        $this->loyaltyEntityManager->saveLoyaltyPoint($loyaltyPointTransfer);
    }
}
