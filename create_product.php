<?php
/**
 * create_product.php <name>
 * ---
 * Script to insert products into the database.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Get the product name as passed from the command line
// @see http://php.net/manual/en/reserved.variables.argv.php
$newProductName = $argv[1];

// Create a new product object and set its name
$product = new Product();
$product->setName($newProductName);

/**
 * Use the EntityManager to insert a new entity into the database
 * @see http://docs.doctrine-project.org/en/2.0.x/reference/working-with-objects.html#persisting-entities
 */
$entityManager->persist($product); // Notify the EntityManager that a new entity should be inserted into the database. No SQL operations are performed yet.
$entityManager->flush();           // Intiate a transaction to actually perform the insertion. Issues all necessary SQL statements at once to synchronize your objects with the database in a single, short transaction.

// Print success message
echo "Created Product with ID " . $product->getId() . "\n";
?>