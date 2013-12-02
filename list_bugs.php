<?php
/**
 * list_bugs.php
 * ---
 * Script to list all bugs in the database.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

/**
 * Create DQL query to pull bugs from the database.
 * @see http://docs.doctrine-project.org/en/latest/reference/dql-doctrine-query-language.html
 * ---
 * @note The QueryBuilder is an alternative to handwriting DQL: $entityManager->createQueryBuilder()
 * @see http://docs.doctrine-project.org/projects/doctrine-mongodb-odm/en/latest/reference/query-builder-api.html#creating-a-query-builder
 */
$dql = "SELECT b, e, r
		FROM Bug b
			JOIN b.engineer e
			JOIN b.reporter r
		ORDER BY b.created DESC";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();

// Loop through bugs and display
foreach($bugs AS $bug) {
    echo $bug->getDescription()." - ".$bug->getCreated()->format('d.m.Y')."\n";
    echo "    Reported by: ".$bug->getReporter()->getName()."\n";
    echo "    Assigned to: ".$bug->getEngineer()->getName()."\n";
    foreach($bug->getProducts() AS $product) {
        echo "    Platform: ".$product->getName()."\n";
    }
    echo "\n";
}
?>