<?php
/**
 * create_bug.php <reporter> <engineer> <product_ids>
 * ---
 * Script to insert bugs into the database.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Get the arguments passed from the command line
// @see http://php.net/manual/en/reserved.variables.argv.php
$theReporterId = $argv[1];
$theDefaultEngineerId = $argv[2];
$productIds = explode(",", $argv[3]);

// Find the users in the database associated with reporter and engineer
$reporter = $entityManager->find("User", $theReporterId);
$engineer = $entityManager->find("User", $theDefaultEngineerId);
if (!$reporter || !$engineer) {
    echo "No reporter and/or engineer found for the input.\n";
    exit(1);
}

// Create a new Bug
$bug = new Bug();
$bug->setDescription("Something does not work!");
$bug->setCreated(new DateTime("now"));
$bug->setStatus("OPEN");

// Loop through the specified products and assign bug
foreach ($productIds AS $productId) {
    $product = $entityManager->find("Product", $productId);
    $bug->assignToProduct($product);
}

// Set user references for bug
$bug->setReporter($reporter);
$bug->setEngineer($engineer);

/**
 * Use the EntityManager to insert a new entity into the database
 * @see http://docs.doctrine-project.org/en/2.0.x/reference/working-with-objects.html#persisting-entities
 */
$entityManager->persist($bug); // Notify the EntityManager that a new entity should be inserted into the database. No SQL operations are performed yet.
$entityManager->flush();       // Intiate a transaction to actually perform the insertion. Issues all necessary SQL statements at once to synchronize your objects with the database in a single, short transaction.

// Print success message
echo "Your new Bug Id: ".$bug->getId()."\n";
?>