<?php
require_once './app/Repositories/ProductRepository.php';
require_once './app/Interface/ProductInterface.php';
class ProductsController extends ProductRepository implements ProductInterface
{
    public function create($userId, $categoryId, $name, $price)
    {
        $data = $this->validate($userId, $categoryId, $name, $price);
        try {
            return $this->createProduct($data);
        } catch (\Throwable $th) {
            die("An error occured: ". $th->getMessage());
        }
    }
    public function show(int $id)
    {
        return $this->getProductById($id);
    }
    public function index()
    {
        return $this->getProducts();
    }
    public function delete(int $id)
    {
        return $this->deleteProduct($id);
    }
}