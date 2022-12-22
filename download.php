<?php
session_start();
$name = $_SESSION["name"];
$project_name = $_POST["project_name"];
$zipFile = "project.zip";

// Initializing PHP class
$zip = new ZipArchive();
$zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);

$files = scandir('./'.$project_name);

foreach($files as $file) {
    if($file == '.' || $file == '..') continue;
    $zip->addFile('./'.$project_name.'/'.$file, $file);
}

$zip->close();

//Force download a file in php
if (file_exists($zipFile)) {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($zipFile));
	readfile($zipFile);
	exit;
}

?>