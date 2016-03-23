<?php

// Change memory limit
ini_set('memory_limit', '1024M');

// Source data file
$dataFile = 'data/mobythes.aur';

// Structured data file
$finalFile = 'structured/synonyms.sql';

// Check and open source file line by line
$lines = file($dataFile, FILE_IGNORE_NEW_LINES);
if (!$lines)
    exit;

// Check and open Structured data file for write
$structuredFile = fopen($finalFile, 'a');
if (!$structuredFile)
    exit;

// Define group number for every line (for every word and it's synonyms)
$groupId = 1;

// Handle every line
foreach ($lines as $line) {

    // Explode line by comma
    $commaSeparated = explode(',', $line);

    // Create Mysql insert query
    $structuredQuery = "\r\nINSERT INTO synonyms (`id`, `group`, `word`) VALUES \r\n";

    // Create query for every word
    foreach ($commaSeparated as $word) {
        $structuredQuery .= '("", '.$groupId.', "'.$word.'"),';
    }

    $groupId++;

    // Edit query string for converting last comma to semicolon
    $finalQuery = substr($structuredQuery, 0, -1).';';  

    // Add string to our file
    fwrite($structuredFile, $finalQuery."\r\n");

}

// Close file
fclose($structuredFile);
