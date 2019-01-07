<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/user-session.php';
require_once '../Validation/register.php';

try {
	$product = new ProductDao($_POST['name'], $_POST['description'], $_POST['weight'], $_POST['color'], $_POST['category_id']);
	validateNewProduct(4, $product);
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/product.php");
}