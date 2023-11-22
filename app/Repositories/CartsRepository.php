<?php

require_once './app/Database/Database.php';
class CartsRepository extends Database
{
    protected function addToCart($productId, $userId)
    {
        $statement = $this->pdo()->prepare("INSERT INTO carts (product_id, user_id, created_at, updated_at) VALUES (?, ?, ?, ?)");
        $date = date('Y-m-d H:i:s');
        $statement->execute([$productId, $userId, $date, $date]);
        return "Product added to cart";
    }

    protected function removeCart($cartId)
    {
        $statement = $this->pdo()->prepare("DELETE FROM carts WHERE id = ?");
        $statement->execute([$cartId]);
        return "Product removed from cart";
    }

    protected function fetchUserCarts($userId)
    {
        $statement = $this->pdo()->prepare("SELECT * FROM carts INNER JOIN products ON products.id = carts.product_id WHERE carts.user_id = ?");
        $statement->execute([$userId]);
        return $statement->fetchAll();
    }
}