<?php

require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;

$reader = new Reader('data/GeoLite2-City.mmdb');

header("Content-Type: application/json; charset=UTF-8");

// Use the ip of google dns to lookup geo information.
$lookup = '8.8.8.8';

// Get the result from the maxmind reader.
$result = $reader->city($lookup);

echo json_encode($result);

?>