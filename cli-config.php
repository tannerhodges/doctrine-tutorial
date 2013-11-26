<?php
/**
 * cli-config.php
 * ---
 * Allows the use of Doctrine's command line tools:
 * ```bash
 * php vendor/bin/doctrine
 * ```
 * @note Command must be called from within the Composer binary directory.
 * @see http://docs.doctrine-project.org/en/latest/reference/configuration.html#setting-up-the-commandline-tool
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Register your application's EntityManager to the console tool in order to make use of the tasks
// @note Assumes $entityManager has already been initialized
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
?>