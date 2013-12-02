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
$dql = "SELECT b, e, r, p
        FROM Bug b
            JOIN b.engineer e
            JOIN b.reporter r
            JOIN b.products p
        ORDER BY b.created DESC";

// Perform query and save results in an array
$query = $entityManager->createQuery($dql);
$bugs = $query->getArrayResult();

// Loop through bugs and display
foreach ($bugs AS $bug) {
    echo $bug['description'] . " - " . $bug['created']->format('d.m.Y')."\n";
    echo "    Reported by: ".$bug['reporter']['name']."\n";
    echo "    Assigned to: ".$bug['engineer']['name']."\n";
    foreach($bug['products'] AS $product) {
        echo "    Platform: ".$product['name']."\n";
    }
    echo "\n";
}
?>