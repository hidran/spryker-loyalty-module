<?php

namespace SprykerAcademy\Zed\Loyalty\Persistence;

use Generated\Shared\Transfer\CustomerLoyaltyTransfer;
use Generated\Shared\Transfer\LoyaltyPointTransfer;
use Generated\Shared\Transfer\LoyaltyRuleTransfer;
use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\Loyalty\Persistence\Map\SpyAcademyLoyaltyPointTableMap;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyPersistenceFactory getFactory()
 */
class LoyaltyRepository extends AbstractRepository implements LoyaltyRepositoryInterface
{
    public function findCustomerLoyaltyByIdCustomer(int $idCustomer): ?CustomerLoyaltyTransfer
    {
        $loyaltyPointEntities = $this->getFactory()
            ->createLoyaltyPointQuery()
            ->filterByFkCustomer($idCustomer)
            ->find();

        if ($loyaltyPointEntities->count() === 0) {
            return null;
        }

        $customerData = $this->getFactory()
            ->createLoyaltyPointQuery()
            ->joinWithSpyCustomer()
            ->filterByFkCustomer($idCustomer)
            ->select([SpyCustomerTableMap::COL_CUSTOMER_REFERENCE])
            ->findOne();

        $customerLoyaltyTransfer = (new CustomerLoyaltyTransfer())
            ->setFkCustomer($idCustomer)
            ->setCustomerReference($customerData);

        $currentBalance = 0;
        foreach ($loyaltyPointEntities as $loyaltyPointEntity) {
            $loyaltyPointTransfer = (new LoyaltyPointTransfer())->fromArray($loyaltyPointEntity->toArray(), true);
            $customerLoyaltyTransfer->addLoyaltyPointHistoryEntry($loyaltyPointTransfer);
            $currentBalance += $loyaltyPointEntity->getPoints();
        }

        return $customerLoyaltyTransfer->setCurrentBalance($currentBalance);
    }

    public function findActiveLoyaltyRuleByType(string $ruleType): ?LoyaltyRuleTransfer
    {
        $loyaltyRuleEntity = $this->getFactory()
            ->createLoyaltyRuleQuery()
            ->filterByType($ruleType)
            ->filterByIsActive(true)
            ->findOne();

        if (!$loyaltyRuleEntity) {
            return null;
        }

        return (new LoyaltyRuleTransfer())->fromArray($loyaltyRuleEntity->toArray(), true);
    }
}
