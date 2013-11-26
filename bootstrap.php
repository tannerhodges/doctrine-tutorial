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

/**
 * Settings
 * ---
 * $paths     = Path to Entity files
 * $isDevMode = Determines caching behavior in the Setup helper
 * 				@see vendor\doctrine\orm\lib\Doctrine\ORM\Tools\Setup::createConfiguration()
 */
$paths     = array(__DIR__."/src");
$isDevMode = true;

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