<?php

class ProductCategoryRepository extends Database
{
    use Utilities;
    public function validate($name)
    {
        if ($this->cleanUpString($name) == '') die("Name is required");
        return [
            'name' => $this->cleanUpString($name)
        ];
    }
    public function create($data)
    {
        $statement = $this->pdo()->prepare("INSERT INTO product_categories (name, created_at, updated_at) VALUES (?, ?, ?)");
        $date = date('Y-m-d H:i:s');
        $statement->execute([$data['name'], $date, $date]);
        return "Category created";
    }
}
