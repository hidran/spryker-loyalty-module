<?php

declare(strict_types=1);

namespace SprykerAcademy\Zed\Loyalty\Persistence;

use Orm\Zed\Loyalty\Persistence\SpyAcademyLoyaltyPointQuery;
use Orm\Zed\Loyalty\Persistence\SpyAcademyLoyaltyRuleQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class LoyaltyPersistenceFactory extends AbstractPersistenceFactory
{

    public function createLoyaltyPointQuery(): SpyAcademyLoyaltyPointQuery
    {
        return SpyAcademyLoyaltyPointQuery::create();
    }
    
    public function createLoyaltyRuleQuery(): SpyAcademyLoyaltyRuleQuery
    {
        return SpyAcademyLoyaltyRuleQuery::create();
    }
}
