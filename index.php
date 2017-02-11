<?php

require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;

$lookup = new Reader('data/GeoLite2-City.mmdb');

// The ip to lookup
$ip = '8.8.8.8'; // Google public dns

// Lookup the ip in the database.
$result = $lookup->city($ip);

print($result->country->isoCode . "\n");
print($result->country->name . "\n");
print($result->country->names['zh-CN'] . "\n");

print($result->mostSpecificSubdivision->name . "\n");
print($result->mostSpecificSubdivision->isoCode . "\n");

print($result->city->name . "\n");

print($result->postal->code . "\n");

print($result->location->latitude . "\n");
print($result->location->longitude . "\n");