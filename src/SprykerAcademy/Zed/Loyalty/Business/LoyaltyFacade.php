<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace SprykerAcademy\Zed\Loyalty\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerAcademy\Zed\Loyalty\Business\LoyaltyBusinessFactory getFactory()
 * @method \SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyRepositoryInterface getRepository()
 * @method \SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyEntityManagerInterface getEntityManager()
 */
class LoyaltyFacade extends AbstractFacade implements LoyaltyFacadeInterface
{
}
