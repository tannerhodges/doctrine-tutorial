<?php
/**
 * show_bug.php <id>
 * ---
 * Script to show a bug based on its id.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Get the bug id as passed from the command line
// @see http://php.net/manual/en/reserved.variables.argv.php
$theBugId = $argv[1];

// Find the bug in the database with the requested id
// @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager::find()
$bug = $entityManager->find("Bug", (int)$theBugId);

// If no bug was found, display message and exit
if ($bug === null) {
    echo "No bug found.\n";
    exit(1);
}

// Display bug information
echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
?>