<?php

require_once './app/Controllers/UserAccountController.php';
require_once './app/Controllers/ClothingProductDiscount.php';
require_once './app/Controllers/ProductsController.php';
require_once './app/Controllers/CategoriesController.php';
require_once './app/Controllers/CartsController.php';

// $category = new CategoriesController;

// $create = $category->addCategory('Foods');
// print_r($create);

$carts = new CartsController;
$fetchCarts = $carts->fetchCarts(1);
print_r($fetchCarts);

# added a comment to the index

// $fetchCarts = 

// echo $discount->calculateDiscount(25000, 20);

// $account = new UserAccountController;

// $newUser = $account->createUserAccount('', 'wisdomdiala5@gmail.com', 'password');
// // $users = $account->deleteUserAccount(9);

// print_r($newUser);