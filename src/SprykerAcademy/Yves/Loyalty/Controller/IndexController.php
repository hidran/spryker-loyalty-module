<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace SprykerAcademy\Yves\Loyalty\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Spryker\Yves\Kernel\View\View;

/**
 * @method \SprykerAcademy\Yves\Loyalty\LoyaltyFactory getFactory()
 */
class IndexController extends AbstractController
{
    protected const LOYALTY_HISTORY_TEMPLATE = '@Loyalty/views/loyalty/loyalty.twig';

    public function indexAction(): View
    {
        $customerTransfer = $this->getFactory()
            ->getCustomerClient()
            ->getCustomer();

        $customerLoyaltyTransfer = $this->getClient()->getCustomerLoyalty($customerTransfer);
//dd($customerLoyaltyTransfer);
        return $this->view(
            [
                'loyalty' => $customerLoyaltyTransfer,
            ],
            [],
            static::LOYALTY_HISTORY_TEMPLATE
        );
    }
}
