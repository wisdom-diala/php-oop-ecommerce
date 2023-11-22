<?php

require_once './app/Repositories/UserRepository.php';
require_once './app/Interface/UserAccountInterface.php';
class UserAccountController extends UserRepository implements UserAccountInterface
{
    public function createUserAccount(string $name, string $email, string $password)
    {
        $data = $this->validate($name, $email, $password);
        try {
            return $this->createUser($data);
        } catch (\Throwable $th) {
            die("An internal server error occured: ". $th->getMessage());
        }
    }

    public function fetchUserAccounts()
    {
        try {
            return $this->getAllUsers();
        } catch (\Throwable $th) {
            die("An internal server error occured: ". $th->getMessage());
        }
    }
    public function fetchAUserAccount($userId)
    {
        try {
            return $this->getUserById($userId);
        } catch (\Throwable $th) {
            die("An internal server error occured: ". $th->getMessage());
        }
    }
    public function updateUserAccount(int $userId, string $name)
    {
        try {
            return $this->updateUser($userId, $name);
        } catch (\Throwable $th) {
            die("An internal server error occured: ". $th->getMessage());
        }
    }
    public function deleteUserAccount($userId)
    {
        if (!$this->getUserById($userId)) die("User not found");
        try {
            return $this->deleteAUser($userId);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}