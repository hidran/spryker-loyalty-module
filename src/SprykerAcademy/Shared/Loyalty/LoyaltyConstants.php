<?php


declare(strict_types=1);

namespace Pyz\Shared\Loyalty;

/**
 * Defines constants for the Loyalty module.
 * These can be used for configuration values that are accessed across different layers.
 */
interface LoyaltyConstants
{
    /**
     * Specification: Defines the default number of days after which loyalty points expire.
     * Set to 0 or null for no expiration.
     *
     * @api
     */
    public const DEFAULT_LOYALTY_POINT_EXPIRY_DAYS = 'LOYALTY:DEFAULT_LOYALTY_POINT_EXPIRY_DAYS';

    /**
     * Specification: Defines the type of loyalty point calculation for earning.
     * Example values: 'GROSS_PRICE', 'NET_PRICE'.
     *
     * @api
     */
    public const LOYALTY_EARN_CALCULATION_TYPE = 'LOYALTY:LOYALTY_EARN_CALCULATION_TYPE';

    /**
     * Specification: Defines if partial redemption of a single loyalty point entry is allowed.
     *
     * @api
     */
    public const IS_PARTIAL_REDEMPTION_OF_ENTRY_ALLOWED = 'LOYALTY:IS_PARTIAL_REDEMPTION_OF_ENTRY_ALLOWED';

    /**
     * Specification: The default source string for points earned via orders.
     *
     * @api
     */
    public const SOURCE_ORDER_PLACEMENT = 'LOYALTY:SOURCE_ORDER_PLACEMENT';

    /**
     * Specification: The default source string for points redeemed.
     *
     * @api
     */
    public const SOURCE_REDEMPTION = 'LOYALTY:SOURCE_REDEMPTION';

    /**
     * Specification: Minimum order value to earn points.
     * Set to 0 if no minimum.
     *
     * @api
     */
    public const MINIMUM_ORDER_VALUE_TO_EARN_POINTS = 'LOYALTY:MINIMUM_ORDER_VALUE_TO_EARN_POINTS';

    /**
     * Specification: Loyalty points redemption value per point (e.g., 0.01 means 1 point = 0.01 currency unit).
     * This could also be managed by rules, but a default might be useful.
     *
     * @api
     */
    public const REDEMPTION_VALUE_PER_POINT = 'LOYALTY:REDEMPTION_VALUE_PER_POINT';
}
