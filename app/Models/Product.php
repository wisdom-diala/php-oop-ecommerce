<?php

class Product 
{
    protected $id;
    protected $name;
    protected $price;
    protected $userId;
    protected $categoryId;

    public function __construct(int $id, int $userId, int $categoryId, string $name, string $price, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->price = $price;
    }

    public function getProductPrice(): void
    {
        
    }
}
