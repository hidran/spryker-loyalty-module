<?php

namespace SprykerAcademy\Zed\Loyalty\Business\Writer;

use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;

interface LoyaltyWriterInterface
{
    public function awardPointsForOrder(SaveOrderTransfer $orderTransfer, QuoteTransfer $quoteTransfer): void;
}
