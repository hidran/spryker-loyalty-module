<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerAcademy\Zed\Loyalty;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class LoyaltyDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PLUGIN_LOGGER = 'PLUGIN_LOGGER';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addLoggerPlugin($container);

        return $container;
    }

    protected function addLoggerPlugin(Container $container): Container
    {
        $container->set(static::PLUGIN_LOGGER, function (Container $container) {
            return $container->getLocator()->log()->plugin();
        });

        return $container;
    }
}
