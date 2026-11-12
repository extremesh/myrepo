<?php
// File: generate_kodi_index.php

// Folder to scan (current folder)
$folder = __DIR__;

// Output HTML file
$outputFile = $folder . '/index.html';

// Get all zip files in the folder
$zipFiles = glob($folder . '/*.zip');

// Open index.html for writing
$html = fopen($outputFile, 'w');

if ($html === false) {
    die("Cannot create index.html");
}

// Write each zip file as a single <a> link line
foreach ($zipFiles as $filePath) {
    $fileName = basename($filePath);
    // Write link in Kodi-friendly format
    fwrite($html, '<a href="' . $fileName . '">' . $fileName . '</a><br />' . "\n");
}

fclose($html);

echo "index.html has been generated successfully with " . count($zipFiles) . " files.\n";
?>
