<?php
require_once './app/Database/Database.php';
require_once './app/Utilities/Utilities.php';
class UserRepository extends Database
{
    use Utilities;
    /**
     * Validates user data
     * @return array
     */
    protected function validate($name, $email, $password): array
    {
        if ($this->getUserByEmail($email)) die("Email already exists");
        if ($this->cleanUpString($email) != '' && $this->cleanUpString($name) != '' && $password != ''){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("Invalid email");
            $data = [
                'email' => $this->cleanUpString($email),
                'name' => $this->cleanUpString($name),
                'password' => $password
            ];
            return $data;
        } else {
            die("All fields are required.");
        }
    }

    protected function validateUserName($name): string
    {
        if ($this->cleanUpString($name) != '') die("The name is required.");
        return $this->cleanUpString($name);
    }
    /**
     * This method creates a new user
     * @return array
     */
    protected function createUser(array $data): array
    {
        $statement = $this->pdo()->prepare("INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
        $statement->execute([$data['name'], $data['email'], password_hash($data['password'], PASSWORD_DEFAULT), date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
        return $this->getUserByEmail($data['email']);
    }

    /**
     * This update user account
     * @return array
     */
    protected function updateUser(int $userId, string $name): array
    {
        $statement = $this->pdo()->prepare("UPDATE users SET name = ? WHERE id = ?");
        $statement->execute([$name, $userId]);
        return $this->getUserById($userId);
    }

    /**
     * This fetch user by ID
     * @return array|bool
     */
    protected function getUserById(int $userId): array|bool
    {
        $statement = $this->pdo()->prepare("SELECT * FROM users WHERE id = ?");
        $statement->execute([$userId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Fetch users
     * @return ?array
     */
    protected function getAllUsers(): ?array
    {
        $statement = $this->pdo()->prepare("SELECT * FROM users");
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * Fetch user using the user email
     * @return array
     */
    protected function getUserByEmail(string $email): array|bool
    {
        $statement = $this->pdo()->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
        $statement->execute([$email]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * This delete a user
     * @return bool
     */
    protected function deleteAUser(int $userId): string
    {
        $statement = $this->pdo()->prepare("DELETE FROM users WHERE id = ?");
        $statement->execute([$userId]);
        return ($statement) ? "User deleted" : 'An error occure while deleting record';
    }
}