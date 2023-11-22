<?php

interface ProductInterface
{
    public function create($userId, $categoryId, $name, $price);
    public function show(int $id);
    public function index();
    public function delete(int $id);
}