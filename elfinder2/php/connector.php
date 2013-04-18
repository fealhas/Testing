<?php

error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';

/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0   // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')  // set read+write to false, other (locked+hidden) set to true
		: ($attr == 'read' || $attr == 'write');  // else set read+write to true, locked+hidden to false
}

// var_dump($_POST);
// exit();

$basePath = '/var/www/files/';
$baseUrl = 'http://10.2.55.89/files/';

$attachFolder = $basePath;
$attachUrl = $baseUrl;

if (isset($_POST['module']) && isset($_POST['rec_id']) && isset($_POST['cat_id']))
{
	$recFolder = crc32($_POST['module']).'/'
				.crc32($_POST['cat_id'].'_'.$_POST['rec_id']); //don't scare
	//$recFolder = $_POST['module'].'/'.$_POST['cat_id'].'_'.$_POST['rec_id'];
	

	$attachPath = $basePath.$recFolder;

	if (! (file_exists($attachPath) && is_dir($attachPath)))
		mkdir($attachPath,0777,true);
	
	$attachUrl.=$recFolder;
	$attachFolder.=$recFolder;
}
else
	if (isset($_GET['module']) && isset($_GET['rec_id']) && isset($_GET['cat_id']))
	{
		$recFolder = crc32($_GET['module']).'/'
					.crc32($_GET['cat_id'].'_'.$_GET['rec_id']); //don't scare
		//$recFolder = $_POST['module'].'/'.$_POST['cat_id'].'_'.$_POST['rec_id'];
		

		$attachPath = $basePath.$recFolder;

		if (! (file_exists($attachPath) && is_dir($attachPath)))
			mkdir($attachPath,0777,true);
		
		$attachUrl.=$recFolder;
		$attachFolder.=$recFolder;
	}

// var_dump($attachFolder);
// var_dump($attachUrl);
// exit();

// var_dump($attachFolder);
// var_dump($attachUrl);
// exit();

$opts = array(
	'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
			'path'          => $attachFolder, // path to files (REQUIRED)
			'URL'           => $attachUrl, // URL to files (REQUIRED)
			'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
		)
	)
);

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

