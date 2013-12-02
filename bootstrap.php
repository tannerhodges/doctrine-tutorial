<?php
/**
 * bootstrap.php
 * ---
 * @see http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html#obtaining-the-entitymanager
 * @see http://docs.doctrine-project.org/en/latest/reference/configuration.html#obtaining-an-entitymanager
 * @see http://docs.doctrine-project.org/en/latest/reference/advanced-configuration.html
 */

// Composer init
require_once "vendor/autoload.php";

// Doctrine libraries
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Additional repositories
require_once "src/BugRepository.php";

/**
 * Settings
 * ---
 * $paths     = Path to Entity files
 * $isDevMode = Determines caching behavior in the Setup helper
 * 				@see vendor\doctrine\orm\lib\Doctrine\ORM\Tools\Setup::createConfiguration()
 */
$paths     = array(__DIR__."/src");
$isDevMode = true;

/**
 * Set default timezone so that 'new DateTime("now")' will work correctly in Doctrine
 * "It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function."
 * @see http://docs.doctrine-project.org/en/2.0.x/cookbook/working-with-datetime.html#default-timezone-gotcha
 */
date_default_timezone_set('US/Eastern');

// Database configuration parameters
// @see http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html
$conn = array(
    'driver' => 'pdo_sqlite',
    'path'   => __DIR__ . '/db.sqlite',
);

// Create a simple "default" Doctrine ORM configuration for Annotations
// and obtain the entity manager
$config        = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($conn, $config);

?>