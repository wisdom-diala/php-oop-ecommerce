<?php

interface DiscountStrategy
{
    public function calculateDiscount($originalPrice, $discount);
}