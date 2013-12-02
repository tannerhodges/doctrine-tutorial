<?php
/**
 * list_bugs.php
 * ---
 * Script to list all bugs in the database.
 */

// Require your application's bootstrap file
require_once "bootstrap.php";

// Perform query and save results in an array
$bugs = $entityManager->getRepository('Bug')->getRecentBugsArray();

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