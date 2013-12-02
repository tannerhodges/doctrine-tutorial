<?php
/**
 * dashboard.php <id>
 * ---
 * Script to show the dashboard for a user based on id.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Get the id as passed from the command line
// @see http://php.net/manual/en/reserved.variables.argv.php
$theUserId = $argv[1];

/**
 * Create DQL query to pull items from the database.
 * @see http://docs.doctrine-project.org/en/latest/reference/dql-doctrine-query-language.html
 * ---
 * @note The QueryBuilder is an alternative to handwriting DQL: $entityManager->createQueryBuilder()
 * @see http://docs.doctrine-project.org/projects/doctrine-mongodb-odm/en/latest/reference/query-builder-api.html#creating-a-query-builder
 */
$dql = "SELECT b, e, r
		FROM Bug b
			JOIN b.engineer e
			JOIN b.reporter r
       	WHERE
       		b.status = 'OPEN' AND
       		(e.id = ?1 OR r.id = ?1)
   		ORDER BY b.created DESC";

/**
 * Perform query and save results
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager
 * @see http://docs.doctrine-project.org/en/latest/reference/dql-doctrine-query-language.html#parameters
 */
$myBugs = $entityManager->createQuery($dql)
                        ->setParameter(1, $theUserId)
                        ->setMaxResults(15)
                        ->getResult();

// Display user information
echo "You have created or been assigned to " . count($myBugs) . " open bugs:\n\n";
// Loop through and display all bugs
foreach ($myBugs AS $bug) {
    echo $bug->getId() . " - " . $bug->getDescription()."\n";
}
?>