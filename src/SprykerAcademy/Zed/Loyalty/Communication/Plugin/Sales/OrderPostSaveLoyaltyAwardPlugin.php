<?php

declare(strict_types=1);

namespace SprykerAcademy\Zed\Loyalty\Communication\Plugin\Sales;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\SalesExtension\Dependency\Plugin\OrderPostSavePluginInterface;

/**
 * @method \SprykerAcademy\Zed\Loyalty\Business\LoyaltyFacadeInterface getFacade()
 * @method \SprykerAcademy\Zed\Loyalty\Communication\LoyaltyCommunicationFactory getFactory()
 */
class OrderPostSaveLoyaltyAwardPlugin extends AbstractPlugin implements OrderPostSavePluginInterface
{

    public function execute(SaveOrderTransfer $saveOrderTransfer, QuoteTransfer $quoteTransfer): SaveOrderTransfer
    {
        $orderTransfer = $saveOrderTransfer->getOrderTransfer();

        // Guard clause to ensure we only process orders for registered customers with a valid OrderTransfer.
        if ($orderTransfer === null || $orderTransfer->getCustomer() === null || $orderTransfer->getCustomer(
            )->getIdCustomer() === null) {
            return $saveOrderTransfer;
        }

        try {
            $this->getFacade()->awardPointsForOrder($orderTransfer);
        } catch (\Exception $exception) {
            // Enterprise Best Practice: A failure in a non-critical, post-save hook
            // must be logged thoroughly but MUST NOT throw an exception that could
            // roll back the primary transaction or show an error to the end-user.
            $this->getFactory()->getLogger()->error(
                'Loyalty points award failed for order.',
                [
                    'exception_message' => $exception->getMessage(),
                    'order_reference' => $orderTransfer->getOrderReference(),
                    'customer_reference' => $orderTransfer->getCustomer()->getCustomerReference(),
                    'trace' => $exception->getTraceAsString(),
                ]
            );
        }

        return $saveOrderTransfer;
    }
}
