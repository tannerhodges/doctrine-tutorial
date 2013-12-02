<?php
/**
 * close_bug.php <id>
 * ---
 * Script to close a bug based on id.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Get the id as passed from the command line
// @see http://php.net/manual/en/reserved.variables.argv.php
$theBugId = $argv[1];

// Find the bug in the database with the requested id
// @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager::find()
$bug = $entityManager->find("Bug", (int)$theBugId);

// Close the bug
// @note Is not updated in the database until flush() is called.
$bug->close();

/**
 * Flush all changes to objects that have been queued up to now to the database.
 * I.e., synchronize the in-memory state of managed objects with the database.
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\EntityManager::flush()
 * @see vendor\doctrine\orm\lib\Doctrine\ORM\UnitOfWork::commit()
 */
$entityManager->flush();
?>