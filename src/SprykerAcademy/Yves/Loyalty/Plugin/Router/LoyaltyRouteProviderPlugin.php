<?php

declare(strict_types=1);

namespace SprykerAcademy\Yves\Loyalty\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class LoyaltyRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_LOYALTY_INDEX = 'loyalty-index';

    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/loyalty', 'Loyalty', 'Index', 'index');
        $routeCollection->add(static::ROUTE_LOYALTY_INDEX, $route);

        return $routeCollection;
    }
}
