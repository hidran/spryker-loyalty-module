<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace SprykerAcademy\Zed\Loyalty\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerAcademy\Zed\Loyalty\Business\Reader\LoyaltyReader;
use SprykerAcademy\Zed\Loyalty\Business\Reader\LoyaltyReaderInterface;
use SprykerAcademy\Zed\Loyalty\Business\Writer\LoyaltyWriter;
use SprykerAcademy\Zed\Loyalty\Business\Writer\LoyaltyWriterInterface;

/**
 * @method \SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyRepositoryInterface getRepository()
 * @method \SprykerAcademy\Zed\Loyalty\Persistence\LoyaltyEntityManagerInterface getEntityManager()
 * @method \SprykerAcademy\Zed\Loyalty\LoyaltyConfig getConfig()
 */
class LoyaltyBusinessFactory extends AbstractBusinessFactory
{
    public function createLoyaltyReader(): LoyaltyReaderInterface
    {
        return new LoyaltyReader(
            $this->getRepository(),
        );
    }

    public function createLoyaltyWriter(): LoyaltyWriterInterface
    {
        return new LoyaltyWriter(
            $this->getEntityManager(),
            $this->getRepository(),
            $this->getConfig(),
        );
    }
}
