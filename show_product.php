<?php
/**
 * show_product.php <id>
 * ---
 * Script to show the name of a product based on its id.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Get the product id as passed from the command line
// @see http://php.net/manual/en/reserved.variables.argv.php
$id = $argv[1];

// Find the product in the database with the requested id
// @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager::find()
$product = $entityManager->find('Product', $id);

// If no product was found, display message and exit
if ($product === null) {
    echo "No product found.\n";
    exit(1);
}

// Display the product name
echo sprintf("-%s\n", $product->getName());
?>