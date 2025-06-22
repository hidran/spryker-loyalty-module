<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace SprykerAcademy\Zed\Loyalty;

use Spryker\Zed\Kernel\AbstractBundleConfig;
use SprykerAcademy\Shared\Loyalty\LoyaltyConstants;

class LoyaltyConfig extends AbstractBundleConfig
{
    public function getOrderPlacementSource(): string
    {
        return $this->get(LoyaltyConstants::SOURCE_ORDER_PLACEMENT);
    }
}
