<?php
/**
 * closed_bugs.php
 * ---
 * Script to show the bugs in the database that have been closed.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Use EntityManager to pull bugs with status 'CLOSED'
/**
 * Get the product repository and pull products
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityRepository::findBy()
 * @see http://docs.doctrine-project.org/en/2.0.x/reference/working-with-objects.html#querying
 * @see http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#entity-repositories
 */
$bugs = $entityManager->getRepository('Bug')
                      ->findBy(array('status' => 'CLOSED'));

// Loop through and display bugs
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