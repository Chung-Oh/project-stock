<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Validation/register.php';

try {
	$product = new ProductDao(
		$_POST['name'], 
		$_POST['description'], 
		$_POST['weight'], 
		$_POST['color'], 
		$_POST['category_id'], 
		$_POST['id']
	);
	registerDeleteProduct(10, $product);
} catch (PDOException $e) {
	// Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi removido";
	header("Location: ../View/product.php");
}