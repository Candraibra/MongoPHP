<!DOCTYPE html>
<html>
<?php
require_once __DIR__ . "/vendor/autoload.php";

$connection = new MongoDB\Driver\Manager();
$db = (new MongoDB\Client)->dbweb;

$collection = (new MongoDB\Client)->dbweb->twarga;

$result = $collection->find();

?>
<head>
	<title>Perpustakaan SMK TELKOM Purwokerto</title>
</head>
<body >

