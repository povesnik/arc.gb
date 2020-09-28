<?php


namespace Service\Order;


use Symfony\Component\HttpFoundation\Request;

class BasketFacade
{
    /**
     * Фасад оформления заказа
     * @param Request $request
     * @return void
     */
    public function basketCheckout(Request $request): void
    {
        $basket = new Basket($request->getSession());
        $basket->checkout();
    }
}