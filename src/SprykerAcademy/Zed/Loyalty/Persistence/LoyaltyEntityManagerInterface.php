<?php

namespace SprykerAcademy\Zed\Loyalty\Persistence;

use Generated\Shared\Transfer\LoyaltyPointTransfer;
use Generated\Shared\Transfer\LoyaltyRuleTransfer;

interface LoyaltyEntityManagerInterface
{

    public function saveLoyaltyPoint(LoyaltyPointTransfer $loyaltyPointTransfer): LoyaltyPointTransfer;
    
    public function saveLoyaltyRule(LoyaltyRuleTransfer $loyaltyRuleTransfer): LoyaltyRuleTransfer;
}
