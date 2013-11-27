<?php
/**
 * list_products.php
 * ---
 * Script to list all products in the database.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

/**
 * Get the product repository and pull products
 * @see \vendor\doctrine\orm\lib\Doctrine\ORM\EntityRepository
 * @see http://docs.doctrine-project.org/en/2.0.x/reference/working-with-objects.html#querying
 */
$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

// Loop through and display product names
foreach ($products as $product) {
    echo sprintf("-%s\n", $product->getName());
}
?>