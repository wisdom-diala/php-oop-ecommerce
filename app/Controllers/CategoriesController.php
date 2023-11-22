<?php
require_once './app/Repositories/ProductCategoryRepository.php';
class CategoriesController extends ProductCategoryRepository
{
    public function addCategory($name)
    {
        $data = $this->validate($name);
        try {
            return $this->create($data);
        } catch (\Throwable $th) {
            die("An error occured: ". $th->getMessage());
        }
    }
}
