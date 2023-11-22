<?php
require_once './app/Interface/DiscountStrategy.php';

class ClothingProductDiscount implements DiscountStrategy
{
    public function calculateDiscount($originalPrice, $discount)
    {
        $discount = $originalPrice * ($discount/100);
        return $discount;
    }
}
