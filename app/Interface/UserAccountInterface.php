<?php

interface UserAccountInterface
{
    public function createUserAccount(string $name, string $email, string $password);
    public function fetchUserAccounts();
    public function fetchAUserAccount(int $userId);
    public function updateUserAccount(int $userId, string $name);
    public function deleteUserAccount(int $userId);
}