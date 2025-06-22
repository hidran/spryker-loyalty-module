<?php

namespace SprykerAcademy\Zed\Loyalty\Persistence;

use Generated\Shared\Transfer\LoyaltyPointTransfer;
use Generated\Shared\Transfer\LoyaltyRuleTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyPersistenceFactory getFactory()
 */
class LoyaltyEntityManager extends AbstractEntityManager implements LoyaltyEntityManagerInterface
{
    public function saveLoyaltyPoint(LoyaltyPointTransfer $loyaltyPointTransfer): LoyaltyPointTransfer
    {
        $loyaltyPointEntity = $this->getFactory()
            ->createLoyaltyPointQuery()
            ->filterByIdLoyaltyPoint($loyaltyPointTransfer->getIdLoyaltyPoint())
            ->findOneOrCreate();

        $loyaltyPointEntity->fromArray(
            $loyaltyPointTransfer->modifiedToArray(false)
        );

        $loyaltyPointEntity->setFkCustomer($loyaltyPointTransfer->getFkCustomer());
        $loyaltyPointEntity->setFkSalesOrder($loyaltyPointTransfer->getFkSalesOrder());
        $loyaltyPointEntity->setFkLoyaltyRule($loyaltyPointTransfer->getFkLoyaltyRule());

        $loyaltyPointEntity->save();
        $loyaltyPointTransfer->setIdLoyaltyPoint($loyaltyPointEntity->getIdLoyaltyPoint());

        return $loyaltyPointTransfer;
    }

    public function saveLoyaltyRule(LoyaltyRuleTransfer $loyaltyRuleTransfer): LoyaltyRuleTransfer
    {
        $loyaltyRuleEntity = $this->getFactory()
            ->createLoyaltyRuleQuery()
            ->filterByIdLoyaltyRule($loyaltyRuleTransfer->getIdLoyaltyRule())
            ->findOneOrCreate();

        $loyaltyRuleEntity->fromArray($loyaltyRuleTransfer->modifiedToArray(false));
        $loyaltyRuleEntity->save();

        $loyaltyRuleTransfer->setIdLoyaltyRule($loyaltyRuleEntity->getIdLoyaltyRule());

        return $loyaltyRuleTransfer;
    }
}

