<?php
/**
 * products.php
 * ---
 * Script to show the number of open bugs grouped by product.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

/**
 * Create DQL query to pull scalar result values from the database.
 * @see http://docs.doctrine-project.org/en/latest/reference/dql-doctrine-query-language.html
 * @see http://docs.doctrine-project.org/projects/doctrine1/en/latest/en/manual/data-hydrators.html#scalar
 */
$dql = "SELECT p.id, p.name, count(b.id) AS openBugs
		FROM Bug b
			JOIN b.products p
		WHERE b.status = 'OPEN'
		GROUP BY p.id";

/**
 * Perform query and save results
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\AbstractQuery::getScalarResult()
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\AbstractQuery::execute()
 */
$productBugs = $entityManager->createQuery($dql)->getScalarResult();

// Loop through and display product bugs
foreach($productBugs as $productBug) {
    echo $productBug['name']." has " . $productBug['openBugs'] . " open bugs!\n";
}
?>