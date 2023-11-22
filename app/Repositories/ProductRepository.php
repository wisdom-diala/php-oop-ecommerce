<?php
require_once './app/Database/Database.php';
require_once './app/Utilities/Utilities.php';
class ProductRepository extends Database
{
    use Utilities;
    protected function validate(int $userId, int $categoryId, string $name, float $price): array
    {
        if ($userId == '' && $categoryId == '' && $this->cleanUpString($name) == '' && $this->cleanUpString($price) == '') die("All fields are required!");
        return [
            'userId' => $userId,
            'categoryId' => $categoryId,
            'name' => $this->cleanUpString($name),
            'price' => $this->cleanUpString($price)
        ];

    }
    protected function createProduct(array $data)
    {
        $statement = $this->pdo()->prepare("INSERT INTO products (user_id, category_id, name, price, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)");
        $date = date('Y-m-d H:i:s');
        $statement->execute([$data['userId'], $data['categoryId'], $data['name'], $data['price'], $date, $date]);
        return "Product created";
    }

    protected function getProducts(): array
    {
        $statement = $this->pdo()->prepare("SELECT * FROM products");
        $statement->execute();
        return $statement->fetchAll();
    }

    protected function getProductById(int $productId): ?array
    {
        $statement = $this->pdo()->prepare("SELECT * FROM products WHERE id = ?");
        $statement->execute([$productId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    protected function deleteProduct(int $productId): string
    {
        $statement = $this->pdo()->prepare("DELETE FROM products WHERE id = ?");
        $statement->execute([$productId]);
        return "Product deleted!";
    }
}