<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerAcademy\Client\Loyalty;

use Spryker\Client\Kernel\AbstractBundleDependencyProvider;
use Spryker\Client\Kernel\Container;
use Spryker\Client\ZedRequest\ZedRequestClient;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class LoyaltyDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_ZED_REQUEST = 'CLIENT_ZED_REQUEST';

    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = $this->addZedRequestClient($container);

        return $container;
    }

    protected function addZedRequestClient(Container $container): Container
    {
        $container->set(static::CLIENT_ZED_REQUEST,
            static fn (Container $container):ZedRequestClientInterface => $container->getLocator()->zedRequest()->client()
        );

        return $container;
    }
}
