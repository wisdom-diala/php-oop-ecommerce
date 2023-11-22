<?php

class ElectronicProducts extends Product 
{
    private $brand;
    protected function __construct(int $id, int $userId, int $categoryId, string $name, string $price, $created_at, $updated_at, $brand) 
    {
        parent::__construct($id, $userId, $categoryId, $name, $price, $created_at, $updated_at);
        $this->brand = $brand;
    }

    public function getBrand()
    {
        return $this->brand;
    }
}
