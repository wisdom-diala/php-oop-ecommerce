<?php

class Database {
    private const DBHOST = 'localhost';
    private const DBNAME = 'e_commerce_test';
    private const DBUSER = 'root';
    private const DBPASS = 'wisdom1234';

    protected function pdo()
    {
        try {
            $pdo = new PDO("mysql:host=". self::DBHOST . ";dbname=" . self::DBNAME, self::DBUSER, self::DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: ". $e->getMessage());
        }
    }
}