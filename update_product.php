<?php
/**
 * update_product.php <id> <new-name>
 * ---
 * Script to update a product in the database based on its id.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Get the product id and name as passed from the command line
// @see http://php.net/manual/en/reserved.variables.argv.php
$id = $argv[1];
$newName = $argv[2];

// Find the product in the database with the requested id
// @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager::find()
$product = $entityManager->find('Product', $id);

// If no product was found, display message and exit
if ($product === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}

// Update the product's name
$product->setName($newName);

/**
 * Flush all changes to objects that have been queued up to now to the database.
 * I.e., synchronize the in-memory state of managed objects with the database.
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager::flush()
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\UnitOfWork::commit()
 */
$entityManager->flush();
?>