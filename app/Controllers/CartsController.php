<?php
require_once './app/Repositories/CartsRepository.php';
class CartsController extends CartsRepository 
{
    public function addProductToCart($productId, $userId)
    {
        $addCart = $this->addToCart($productId, $userId);
        return $addCart;
    }

    public function fetchCarts($userId)
    {
        return $this->fetchUserCarts($userId);
    }
}
