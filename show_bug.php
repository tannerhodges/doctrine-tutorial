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

/**
 * Display bug information
 * @note "Since we only retrieved the bug by primary key both the engineer and reporter are not immediately loaded from the database but are replaced by LazyLoading proxies. These proxies will load behind the scenes, when the first method is called on them."
 * @see vendor\doctrine\common\lib\Doctrine\Common\Proxy\ProxyGenerator::generateLazyPropertiesDefaults()
 * @see vendor\doctrine\common\lib\Doctrine\Common\Proxy\ProxyGenerator::getLazyLoadedPublicProperties()
 */
echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
?>