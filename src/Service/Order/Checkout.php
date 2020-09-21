<?php


namespace Service\Order;


class Checkout
{
    /**
     * Проведение всех этапов заказа
     * @param BasketBuilder $basketBuilder
     * @param array $products
     * @return void
     */
    public function process(BasketBuilder $basketBuilder, array $products): void {
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $basketBuilder->getDiscount()->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $billing = $basketBuilder->getBilling();
        $billing->pay($totalPrice);

        $security = $basketBuilder->getSecurity();
        $user = $security->getUser();

        $communication = $basketBuilder->getCommunication();
        $communication->process($user, 'checkout_template');
    }

}