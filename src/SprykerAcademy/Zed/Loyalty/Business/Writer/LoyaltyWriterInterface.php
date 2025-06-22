<?php

namespace SprykerAcademy\Zed\Loyalty\Business\Writer;

use Generated\Shared\Transfer\OrderTransfer;

interface LoyaltyWriterInterface
{
    public function awardPointsForOrder(OrderTransfer $orderTransfer): void;
}
