<?php


namespace Controller;


use Framework\BaseController;
use Service\Billing\Exception\BillingException;
use Service\Communication\Exception\CommunicationException;
use Service\Order\Basket;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderCheckoutController extends BaseController
{
    /**
     * Оформление заказа
     * @param Request $request
     * @return Response
     * @throws BillingException
     * @throws CommunicationException
     */
    public function checkoutAction(Request $request): Response
    {
        $isLogged = (new Security($request->getSession()))->isLogged();
        if (!$isLogged) {
            return $this->redirect('user_authentication');
        }

        (new Basket($request->getSession()))->checkout();

        return $this->render('order/checkout.html.php');
    }
}